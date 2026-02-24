<?php

namespace App\Http\Controllers\Management_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_management_user', only: ['index']),
            new Middleware('permission:create_management_user', only: ['create']),
            new Middleware('permission:create_management_user', only: ['store']),
            new Middleware('permission:update_management_user', only: ['edit']),
            new Middleware('permission:update_management_user', only: ['update']),
            new Middleware('permission:delete_management_user', only: ['destroy']),
        ];
    }

    public function index(){
        $users = User::get();
        return view('management_user.user.index', [
            'users' => $users
        ]);
    }

    public function create(){
        $roles = Role::pluck('name', 'name')->all();
        return view('management_user.user.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'file' => 'mimes:jpeg,png,jpg|max:10204',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->hashName();
            $file->storeAs('public/management_user/foto_profil', $fileName);
    
            // Simpan hanya satu file terakhir
            $user->update(['foto' => $fileName]);
        }
    
        $user->syncRoles($request->roles);
    
        return redirect('management_user/users')->with('status', 'User Berhasil Dibuat');
    }
    

    public function edit(User $user){
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('management_user.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
            'file' => 'mimes:jpeg,png,jpg|max:10204',
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if (!empty($request->password)) {  
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data); 
        $user->syncRoles($request->roles);
    
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($user->foto) {
                Storage::delete('public/management_user/foto_profil/' . $user->foto);
            }
    
            // Simpan file baru
            $file = $request->file('file');
            $fileName = $file->hashName();
            $file->storeAs('public/management_user/foto_profil', $fileName);
    
            // Update database dengan file baru
            $user->update(['foto' => $fileName]);
        }
    
        return redirect('management_user/users')->with('status', 'User Berhasil Diperbarui');
    }
    

    public function destroy($userId){
        $user = User::findOrFail($userId);

        if ($user->foto) {
            $files = explode(',', $user->foto);
            foreach ($files as $file) {
                Storage::delete('public/management_user/foto_profil/' . $file);
            }
        }

        $user->delete();

        return redirect('management_user/users')->with('status', 'User Berhasil Dihapus');

    }
}

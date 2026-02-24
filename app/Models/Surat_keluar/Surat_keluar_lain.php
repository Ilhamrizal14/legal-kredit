<?php

namespace App\Models\Surat_keluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar_lain extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar_lain';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

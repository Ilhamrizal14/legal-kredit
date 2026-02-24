<?php

namespace App\Models\Surat_keluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunas extends Model
{
    use HasFactory;

    protected $table = 'lunas';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

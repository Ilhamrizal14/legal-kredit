<?php

namespace App\Models\Surat_keluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukan_nasabah extends Model
{
    use HasFactory;

    protected $table = 'bukan_nasabah';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

<?php

namespace App\Models\Surat_keluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tidak_dijaminkan extends Model
{
    use HasFactory;

    protected $table = 'tidak_dijaminkan';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

<?php

namespace App\Models\Surat_keluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roya extends Model
{
    use HasFactory;

    protected $table = 'roya';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

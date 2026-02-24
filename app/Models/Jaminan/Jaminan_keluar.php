<?php

namespace App\Models\Jaminan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaminan_keluar extends Model
{
    use HasFactory;

    protected $table = 'jaminan_keluar';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

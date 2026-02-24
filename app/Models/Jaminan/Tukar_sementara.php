<?php

namespace App\Models\Jaminan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tukar_sementara extends Model
{
    use HasFactory;

    protected $table = 'tukar_sementara';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

<?php

namespace App\Models\Notaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuta extends Model
{
    use HasFactory;

    protected $table = 'minuta';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

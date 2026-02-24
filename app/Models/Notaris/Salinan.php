<?php

namespace App\Models\Notaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salinan extends Model
{
    use HasFactory;

    protected $table = 'salinan';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toernooipartij extends Model
{
    use HasFactory;
    protected $fillable = [
        'wit',
        'zwart',
        'uitslag',
        'links',
    ];
    protected $table = 'Toernooipartijen';
}

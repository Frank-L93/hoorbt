<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toernooistand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'verloren',
    ];

    protected $table = 'Toernooistand';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ladderstand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'win',
        'draw',
        'lost',
        'score',
        'tpr',
    ];
    protected $table = 'ladderstand';
}

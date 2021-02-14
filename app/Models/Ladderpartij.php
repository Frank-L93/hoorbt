<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ladderpartij extends Model
{
    use HasFactory;
    protected $fillable = [
        'wit',
        'zwart',
        'uitslag',
    ];
    protected $table = 'Ladderpartijen';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toernooistand extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'verloren',
    ];

    protected $table = 'toernooistand';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}

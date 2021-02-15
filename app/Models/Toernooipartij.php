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
    protected $table = 'toernooipartijen';

    public function getName($user_id){
        if($user_id == "Bye")
        {
            $name = "Bye (win)";
        }
        elseif($user_id == "Afwezig")
        {
            $name = "Afwezig (Bye Verlies)";
        }
        else{
            $user = User::select('name')->where('id', '=', $user_id)->first();
            $name = $user->name;
        }
        return $name;
    }
}

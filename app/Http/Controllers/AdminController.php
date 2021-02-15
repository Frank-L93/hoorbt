<?php

namespace App\Http\Controllers;

use App\Models\Toernooipartij;
use App\Models\Toernooistand;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $users_to_pair = Array();
        foreach($users as $user){
            $user_in_toernooistand = Toernooistand::where('user_id', $user->id)->first();
            if(!is_null($user_in_toernooistand))
            {
                if($user_in_toernooistand->verloren == 2)
                {
                    //
                }
                else
                {
                    array_push($users_to_pair, $user);
                }
            }
            else{
                Toernooistand::create([
                    'user_id' => $user->id,
                    'verloren' => 0,
                ]);
                array_push($users_to_pair, $user);
            }
        }
        $toernooistand = Toernooistand::all();
        $toernooipartij = Toernooipartij::all();
        return view('admin')->with('users', $users_to_pair)->with('toernooistanden', $toernooistand)->with('toernooipartijen', $toernooipartij);
    }

    public function store(Request $request){
    if($request->zwart == "Bye")
    {
        $toernooipartij = Toernooipartij::create([
            'wit' => $request->wit,
            'zwart' => $request->zwart,
            'uitslag' => 1,
        ]);
    }
    elseif($request->zwart == "Afwezig")
    {
        $toernooipartij = Toernooipartij::create([
            'wit' => $request->wit,
            'zwart' => $request->zwart,
            'uitslag' => 2,
        ]);
        $toernooistand_wit = Toernooistand::where('user_id', $request->wit)->first();
        $toernooistand_wit->verloren = $toernooistand_wit->verloren + 1;
        $toernooistand_wit->save();
    }
    else{
        $toernooipartij = Toernooipartij::create([
            'wit' => $request->wit,
            'zwart' => $request->zwart,
        ]);
    }

        return redirect('/admin');
    }
}

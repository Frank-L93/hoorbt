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
            $user_in_toernooistand = Toernooistand::where('name', $user->name)->first();
            if(!is_null($user_in_toernooistand))
            {
                if($user_in_toernooistand->verloren == 2)
                {
                    //
                }
                else
                {
                    array_push($users_to_pair, $user_in_toernooistand->name);
                }
            }
            else{
                Toernooistand::create([
                    'name' => $user->name,
                    'verloren' => 0,
                ]);
                array_push($users_to_pair, $user->name);
            }
        }
        $toernooistand = Toernooistand::all();
        $toernooipartij = Toernooipartij::all();
        return view('admin')->with('users', $users_to_pair)->with('toernooistanden', $toernooistand)->with('toernooipartijen', $toernooipartij);
    }

    public function store(Request $request){

        $toernooipartij = Toernooipartij::create([
            'wit' => $request->wit,
            'zwart' => $request->zwart,
        ]);

        return redirect('/admin');
    }
}

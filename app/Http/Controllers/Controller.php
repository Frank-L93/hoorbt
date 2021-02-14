<?php

namespace App\Http\Controllers;

use App\Models\Toernooipartij;
use App\Models\Toernooistand;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $user = Auth::user();
        $partij = Toernooipartij::where([['wit', '=', $user->name], ['uitslag', '=', NULL]])->orWhere([['zwart', '=', $user->name], ['uitslag', '=', NULL]])->first();
        $users = Toernooistand::select('name')->where('verloren', '<', 2)->get();
        return view('dashboard')->with('partij', $partij)->with('deelnemers', $users);
    }

    public function speler($name)
    {
        $user = Auth::user();
        $partij = Toernooipartij::where([['wit', '=', $user->name], ['uitslag', '=', NULL]])->orWhere([['zwart', '=', $user->name], ['uitslag', '=', NULL]])->first();
        if($partij->wit == $name OR $partij->zwart == $name)
        {
            $speler = User::where('name', $name)->first();
        }
        else
        {
            $speler = "Ongeldig";
        }
        return view('dashboard')->with('speler', $speler);
    }
}

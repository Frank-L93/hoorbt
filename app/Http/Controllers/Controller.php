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
        $wit = strval($user->id);
        $zwart = strval($user->id);
        $partij = Toernooipartij::where([['wit', '=', $wit], ['uitslag', '=', NULL]])->orWhere([['zwart', '=', $zwart], ['uitslag', '=', NULL]])->first();
        if(is_null($partij))
        {$partijnaam_wit = ""; $partijnaam_zwart="";}else{
        if($partij->zwart == "Afwezig")
        {
            $partijnaam_zwart = "Bye (met verlies)";
        }
        elseif($partij->zwart == "Bye")
        {
            $partijnaam_zwart = "Bye (met winst)";
        }
        else{
            $partijnaam_zwart = User::select('name')->where('id', '=', (int)$partij->zwart)->first();
        }
        $partijnaam_wit = User::select('name')->where('id', '=', (int)$partij->wit)->first();}
        $users = Toernooistand::select('user_id')->where('verloren', '<', 2)->get();
        return view('dashboard')->with('partij', $partij)->with('deelnemers', $users)->with('partijnaam_wit', $partijnaam_wit)->with('partijnaam_zwart', $partijnaam_zwart);
    }

    public function speler($name)
    {
        $user = Auth::user();
        $wit = strval($user->id);
        $zwart = strval($user->id);
        $partij = Toernooipartij::where([['wit', '=', $wit], ['uitslag', '=', NULL]])->orWhere([['zwart', '=', $zwart], ['uitslag', '=', NULL]])->first();
        if(is_null($partij))
        {
            $speler = "Geen partij";
        }
        elseif($partij->wit == $name OR $partij->zwart == $name)
        {
            $speler = User::where('id', $name)->first();
        }
        else
        {
            $speler = "Ongeldig";
        }
        return view('speler')->with('speler', $speler);
    }

    public function historie(){
        $user = Auth::user();
        $wit = strval($user->id);
        $zwart = strval($user->id);
        $partij = Toernooipartij::where('wit', '=', $wit)->orWhere('zwart', '=', $zwart)->get();
        return view('historie')->with('partij', $partij);
    }
}

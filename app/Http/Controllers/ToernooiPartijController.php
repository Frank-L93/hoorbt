<?php

namespace App\Http\Controllers;

use App\Models\Toernooipartij;
use App\Models\Toernooistand;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ToernooiPartijController extends Controller
{
    public function store(Request $request){
        $toernooipartij = Toernooipartij::find($request->id);
        $toernooipartij->uitslag = $request->uitslag;
        $toernooipartij->links = $request->links;
        $toernooipartij->save();


            $zwart = User::where('id', $toernooipartij->zwart)->first();
            $wit = User::where('id', $toernooipartij->wit)->first();
            if ($toernooipartij->uitslag == 1) {
                $toernooistand_zwart = Toernooistand::where('user_id', $zwart->id)->first();
                $toernooistand_zwart->verloren = $toernooistand_zwart->verloren + 1;
                $toernooistand_zwart->save();
            } else {
                $toernooistand_wit = Toernooistand::where('user_id', $wit->id)->first();
                $toernooistand_wit->verloren = $toernooistand_wit->verloren + 1;
                $toernooistand_wit->save();
            }


        return redirect(RouteServiceProvider::HOME);
    }
}

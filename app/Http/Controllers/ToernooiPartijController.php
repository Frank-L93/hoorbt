<?php

namespace App\Http\Controllers;

use App\Models\Toernooipartij;
use App\Models\Toernooistand;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ToernooiPartijController extends Controller
{
    public function store(Request $request){
        $toernooipartij = Toernooipartij::find($request->id);
        $toernooipartij->uitslag = $request->uitslag;
        $toernooipartij->links = $request->links;
        $toernooipartij->save();

        if($toernooipartij->uitslag == 1){
            $toernooistand_zwart = Toernooistand::where('name', $toernooipartij->zwart)->first();
            $toernooistand_zwart->verloren = $toernooistand_zwart->verloren+1;
            $toernooistand_zwart->save();
        }
        else{
            $toernooistand_wit = Toernooistand::where('name', $toernooipartij->wit)->first();
            $toernooistand_wit->verloren = $toernooistand_wit->verloren+1;
            $toernooistand_wit->save();
        }

        return redirect(RouteServiceProvider::HOME);
    }
}

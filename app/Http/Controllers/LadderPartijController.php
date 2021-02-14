<?php

namespace App\Http\Controllers;

use App\Events\LadderPartijEvent;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Ladderpartij;

class LadderPartijController extends Controller
{
    public function read()
    {
        $ladderpartijen = Ladderpartij::all();
        return $ladderpartijen;
    }

    public function store(Request $request){
        $request->validate([
            'wit' => 'required',
            'zwart' => 'required',
            'uitslag' => 'required',
        ]);

        $ladderpartij = Ladderpartij::create([
            'wit' => $request->wit,
            'zwart' => $request->zwart,
            'uitslag' => $request->uitslag,
        ]);

        event(new LadderPartijEvent($ladderpartij));

        return redirect(RouteServiceProvider::HOME);
    }
}

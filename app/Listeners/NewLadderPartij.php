<?php

namespace App\Listeners;

use App\Events\LadderPartijEvent;
use App\Models\Ladderstand;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewLadderPartij
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LadderPartijEvent $event)
    {

        $wit = $event->ladderpartij->wit;
        $zwart = $event->ladderpartij->zwart;
        $uitslag = $event->ladderpartij->uitslag;

        // Stand aanvullen voor beide spelers;
        if($uitslag == 1){
            // Wit heeft gewonnen
            $wit_in_stand = Ladderstand::where('name', $wit)->first();
            if(!is_null($wit_in_stand))
            {

                $wit_in_stand->score = $wit_in_stand->score + 1;
                $wit_in_stand->win = $wit_in_stand->win + 1;
                $wit_in_stand->save();
            }
            else {
                Ladderstand::create([
                    'name' => $wit,
                    'win' => 1,
                    'score' => 1,
                ]);
            }
            $zwart_in_stand = Ladderstand::where('name', $zwart)->first();
            if(!is_null($zwart_in_stand))
            {
                $zwart_in_stand->lost = $zwart_in_stand->lost + 1;
                $zwart_in_stand->save();
            }
            else {
                Ladderstand::create([
                    'name' => $zwart,
                    'lost' => 1,
                ]);
            }

        }
        elseif($uitslag == 2){
            $wit_in_stand = Ladderstand::where('name', $wit)->first();
            if(!is_null($wit_in_stand))
            {

                $wit_in_stand->score = $wit_in_stand->score + 0.5;
                $wit_in_stand->draw = $wit_in_stand->draw + 1;
                $wit_in_stand->save();
            }
            else {
                Ladderstand::create([
                    'name' => $wit,
                    'draw' => 1,
                    'score' => 0.5,
                ]);
            }
            $zwart_in_stand = Ladderstand::where('name', $zwart)->first();
            if(!is_null($zwart_in_stand))
            {
                $zwart_in_stand->score = $zwart_in_stand->score + 0.5;
                $zwart_in_stand->draw = $zwart_in_stand->draw + 1;
                $zwart_in_stand->save();
            }
            else {
                Ladderstand::create([
                    'name' => $zwart,
                    'draw' => 1,
                    'score' => 0.5,
                ]);
            }
        }
        elseif($uitslag == 3){
            $wit_in_stand = Ladderstand::where('name', $wit)->first();
            if(!is_null($wit_in_stand))
            {
                $wit_in_stand->lost = $wit_in_stand->lost + 1;
                $wit_in_stand->save();
            }
            else {
                Ladderstand::create([
                    'name' => $wit,
                    'lost' => 1,

                ]);
            }
            $zwart_in_stand = Ladderstand::where('name', $zwart)->first();
            if(!is_null($zwart_in_stand))
            {
                $zwart_in_stand->score = $zwart_in_stand->score + 1;
                $zwart_in_stand->win = $zwart_in_stand->win + 1;
                $zwart_in_stand->save();

            }
            else {
                Ladderstand::create([
                    'name' => $zwart,
                    'win' => 1,
                    'score' => 1,
                ]);
            }
        }
        else{
            // Error
            dd('error', $event);
        }
    }
}

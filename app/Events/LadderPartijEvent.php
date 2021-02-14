<?php

namespace App\Events;

use App\Models\Ladderpartij;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LadderPartijEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /** @var \App\Models\Ladderpartij */
    public $ladderpartij;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ladderpartij $ladderpartij)
    {
        $this->ladderpartij = $ladderpartij;
    }

}

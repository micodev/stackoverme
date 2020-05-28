<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {


        return ['channel-name']; // new Channel("channel-name1");
    }
    // public function broadcastAs()
    // {
    //     return 'channel.app';
    // }
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs(){
        return "test";
    }
    public function broadcastWith()
    {
        return ['title' => 'This notification from ItSolutionStuff.com'];
    }
}

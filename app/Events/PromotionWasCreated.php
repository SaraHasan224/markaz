<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;

use \StdClass;



class PromotionWasCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $promotion;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($promotion)
    {
        $this->promotion = $promotion;
        
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {   
        
       // return new Channel('users');
        
    }

    public function broadcastAs(){
        return 'created';
    }
}

<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;

use \StdClass;



class UserWasNotified extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user;
    public $promotion;
    public $access_token;
    public $store;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
         $this->user = $data['user'];
         $this->promotion = $data['promotion'];
         $this->access_token = $data['access_token'];
         $this->store = $data['store'];
        
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

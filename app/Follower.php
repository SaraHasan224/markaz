<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function hasuser()
    {
        return $this->hasOne(User::class, 'id');
    }
}

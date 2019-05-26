<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /* Created by Sara to use this relation inorder to print data into datatable*/
    public function hasUser()
    {
        return $this->hasOne(User::class, 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class StoreSocialMedia extends Model
{
    use SoftDeletes;
    protected $table = "social_stores";
}
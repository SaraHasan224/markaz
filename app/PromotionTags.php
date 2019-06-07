<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionTags extends Model
{
    use SoftDeletes;
    protected $table = "promotion_tags";
    protected $fillable = ['promotion_id','title'];
    public $timestamps = true;
}

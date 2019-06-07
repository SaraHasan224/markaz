<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionCategories extends Model
{
    use SoftDeletes;
    protected $table = "promotion_categories";
    protected $fillable = ['promotion_id','title'];
    protected $guarded = [];
    public $timestamps = true;
}

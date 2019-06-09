<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use SoftDeletes;
    /* Created by Sara to use this relation inorder to print data into datatable*/
    public function hasstore()
    {
        return $this->hasOne(Store::class, 'id');
    }

    //  Categories
    public function categories()
    {
        return $this->hasOne(PromotionCategories::class, 'promotion_id');
    }

    //  Tags
    public function tags()
    {
        return $this->hasOne(PromotionTags::class, 'promotion_id');
    }

    //  Comments
    public function comments()
    {
        return $this->hasOne(PromotionComment::class, 'promotion_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = "support";
    /* Created by Sara to use this relation inorder to print data into datatable*/
    public function getstore()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}

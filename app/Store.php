<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use SoftDeletes;
    protected $table = "stores";
    /* Created by Sara to use this relation inorder to print data into datatable of Support*/
    public function hassupport()
    {
        return $this->hasMany(Support::class, 'id');
    }
}

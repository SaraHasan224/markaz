<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    // Table Name
    protected $table ='event_logs';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true; 
    
    protected $guarded = [];
    // protected $fillable = ['id','component','component_name','operation','user_id'];
    // protected $guarded = ['component_image','store_id']; 
}

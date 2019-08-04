<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
    // Table Name
    protected $table ='faq';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    protected $fillable = [
        'status'
    ];
}
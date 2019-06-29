<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Store;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','name','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /* Created by Sara to use this relation inorder to print data into datatable*/
    public function stores()
    {
        return $this->hasOne(Store::class, 'id');
    }
    public function roles()
    {
        return $this->hasOne(Role::class, 'id');
    }
}

<?php

/*namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;

use Eloquent;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'first_name','last_name', 'email','role','dept_id', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];
*/
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
//}


namespace App;
use Eloquent;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Eloquent implements Authenticatable
{
     use AuthenticableTrait;

    // ... Other Code
}
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','banned','role','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', //'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function Posts()
    {
        return $this->hasMany('App\Post');
    }
   public function Profile()
   {
       return $this->hasOne('App\Profile');
   }
   public function Subcomments()
   {
       return $this->hasMany('App\Subcomment');
   }
}

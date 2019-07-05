<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[
        'user_id', 'bio', 'age','gender','profile_pic'
    ];
    public function User()
    {
      return $this->belongsTo(User:Class);
    }
}

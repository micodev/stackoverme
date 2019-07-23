<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // id	title	description	like	comment	user_id	deleted_at	created_at	updated_at

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'like','comment','user_id'
    ];
    public function Comments()
    {
        return $this->hasMany(Comment::Class);
    }
    public function User()
    {
        return $this->belongsTo(User::Class);
    }
    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function Images()
    {
        return $this->hasMany("App\Image");
    }
    public function Tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function plike()
    {
        return $this->hasMany('App\Userplike');
    }

}

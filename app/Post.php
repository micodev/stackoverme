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
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }
    public function users()
    {
        return $this->belongsToMany(User::Class);
    }


}

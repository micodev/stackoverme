<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id','description',
    ];
    public function Posts()
    {
        return $this->belongsToMany(Post::Class);
    }
    public function Users()
    {
        return $this->belongsToMany(User::Class);
    }


}

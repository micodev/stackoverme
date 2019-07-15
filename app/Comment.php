<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id','description','is_correct',
    ];
    public function Posts()
    {
        return $this->belongsTo(Post::Class);
    }
    public function User()
    {
        return $this->belongsTo(User::Class);
    }
    public function Images()
    {
        return $this->hasMany(Cimage::Class);
    }
    public function Subcomments()
    {
        return $this->hasMany('App\Subcomment');
    }
}

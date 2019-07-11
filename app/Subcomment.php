<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcomment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description','comment_id','user_id'];
    public function User()
    {
       return $this->BelongsTo(User::class);
    }
    public function Comment()
    {
       return $this->BelongsTo(Comment::class);
    }
}

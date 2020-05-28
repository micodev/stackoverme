<?php

namespace App;

use App\Notifications\PostAnswerNotification;
use Illuminate\Database\Eloquent\Model;

class NotificationPost extends Model
{
    protected $table= "notifications";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function notify($reply)
    {
        $this->post->user->notify(new PostAnswerNotification($this->post, $reply));
    }

}

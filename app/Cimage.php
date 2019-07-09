<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cimage extends Model
{
    public $timestamps=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image','comment_id'];
    public function Comment()
    {
        return $this->belongsTo('App\Comment');
    }
}

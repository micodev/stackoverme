<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image','post_id'];
    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
}

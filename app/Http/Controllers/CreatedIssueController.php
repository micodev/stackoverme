<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Cimage;
use App\Subcomment;

class CreatedIssueController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except("home");
    }
    public function serlize_img($imgs)
    {
     $images = array();
     $myArray =array_filter(explode(',', $imgs));
     foreach ($myArray as $value) {
        $img = new Cimage;
        $img->image = $value;
        $images[] = $img;
     }
     return $images;
    }
    public function Index(Request $request,$id)
    {
        $post = Post::find($id);
        if($post!=null)
        {
            $is_owner = false;
            if($post->User->id ==auth()->user()->id) $is_owner =true;
            return view("problem")->with(['post'=> $post,'imgs'=>$post->Images()->get(),'id'=>$id,'comments'=>$post->Comments(),"is_owner"=>$is_owner]);
        }
        else {
            return $id;
        }

    }
    public function addComment(Request $request,$id)
    {
        // user - post - image
        $user = auth()->user();
        $post =Post::find($id);
        $post->User;
        if($post->User->id == $user->id)
        return back()->withErrors(["error"]);
        $comment = New Comment;
        $comment->description = $request->body_problem;
        $post->Comments()->save($comment);
        $user->Comments()->save($comment);
        $comment->Images()->saveMany($this->serlize_img($request->images));
        return  back();
    }
    public function subcomment(Request $request,$id)
    {
        $comment = Comment::find($request["commentId"]);
        $subcomment = New Subcomment;
        $subcomment->description = $request["comment"];
        $comment->Subcomments()->save($subcomment);
        auth()->user()->Subcomments()->save($subcomment);
        return "success";
    }
}

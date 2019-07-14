<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Cimage;
use App\Subcomment;

class CommentsApiController extends Controller
{
    public function Index(Request $request,$id)
    {
        $post = Post::find($id);
        $comments = $post->Comments;
        foreach ($comments as $value) {
           $value->User;
           $value->Images;
           $sub = $value->SubComments;
           foreach($sub as $su)
            $su->User;
        }
        return json_encode($comments);
    }
    public function CreateSubcomment(Request $request,$id)
    {

        $comment = Comment::find($request["commentId"]);

        $subcomment = New Subcomment;
        $subcomment->description = $request["comment"];
        $comment->Subcomments()->save($subcomment);

        auth()->user()->Subcomments()->save($subcomment);
        $subcomment->User;
        return json_encode(array($request["commentId"],$subcomment));
    }
}

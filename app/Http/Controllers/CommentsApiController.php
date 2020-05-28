<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Cimage;
use App\Subcomment;
use Illuminate\Support\Facades\Auth;
use App\Userclike;

class CommentsApiController extends Controller
{
    public function serlize_img($imgs)
    {
        $images = array();
        $myArray = array_filter(explode(',', $imgs));
        foreach ($myArray as $value) {
            $img = new Cimage;
            $img->image = $value;
            $images[] = $img;
        }
        return $images;
    }

    public function Index(Request $request, $id)
    {
        $post = Post::find($id);
        $comments = $post->Comments;
        foreach ($comments as $value) {
            $value->User;
            $value->Clikes;
            $value->Images;
            $sub = $value->SubComments;
            foreach ($sub as $su)
                $su->User;
        }
        return json_encode($comments);
    }
    public function CommentEdit(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = $post->Comments->find(["id" => $request["commentId"]])->first();
        $comment->images;
        $comment->Images()->delete();
        $comment->Images()->saveMany($this->serlize_img($request["images"]));
        $comment->description = $request->body;
        $comment->save();
        return $comment;
    }
    public function CommentDelete(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = $post->Comments->find(["id" => $request["commentId"]]);
        $comment->first()->delete();
        return json_encode("true");
    }
    public function CreateSubcomment(Request $request, $id)
    {
        $comment = Comment::find($request["commentId"]);
        $subcomment = new Subcomment;
        $subcomment->description = $request["comment"];
        $comment->Subcomments()->save($subcomment);

        auth()->user()->Subcomments()->save($subcomment);
        $subcomment->User;
        return json_encode(array($request["commentId"], $subcomment));
    }
    public function isCorrectLike(Request $request, $id)
    {

        $comment = Comment::where(["post_id" => $id, 'is_correct' => true])->first();
        if ($comment != null) {
            if (Post::find($id)->User->id == auth()->user()->id) {
                $comment->is_correct = 0;
                $comment->save();
            } else {
                return json_encode(false);
            }
        }

        $commenta = Comment::find(["id" => $request["commentId"]])->first();
        if ($comment == null || ($commenta != null && $comment->id != $commenta->id)) {
            if (Post::find($id)->User->id == auth()->user()->id) {
                $commenta->is_correct = true;
                $commenta->save();
            } else {
                return json_encode(false);
            }
        }
        return json_encode(true);
    }
    public function Commentlike(Request $request, $id)
    {
        $cid = $request["commentId"];
        $user = Auth::user();
        $cuser = $user->Clikes();
        $hasLike = $cuser->where(["comment_id" => $cid])->first();
        if ($hasLike == null) {
            $clike = new Userclike;
            $clike->comment_id = $cid;
            $clike->user_id = $user->id;
            $clike->save();
            return json_encode(["like", $clike]);
        } else {
            $hasLike->delete();
            return json_encode(["unlike"]);
        }
        return json_encode(["false"]);
    }
}
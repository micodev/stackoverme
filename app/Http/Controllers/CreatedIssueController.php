<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Cimage;
use App\Image;
use App\Subcomment;
use App\Userplike;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\PostAnswerNotification;
use App\Tag;
use Illuminate\Support\Facades\Redirect;

class CreatedIssueController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except("home");
    }
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
    public function pserlize_img($imgs)
    {
        $images = array();
        $myArray = array_filter(explode(',', $imgs));
        foreach ($myArray as $value) {
            $img = new Image;
            $img->image = $value;
            $images[] = $img;
        }
        return $images;
    }
    public function tags(Request $request, $tag)
    {
        $tag = Tag::where("name", $tag)->first();
        if ($tag == null) return view("inbox")->with(['posts' => []]);
        else {

            $posts = $tag->Posts();
            $ret = $posts->paginate(5);

            return  view("inbox")->with([
                'posts' => $ret->items(),
                "paginator" => $ret
            ]);
        }
    }
    public function Index(Request $request, $id)
    {
        $post = Post::find($id);


        if ($post != null) {
            $userlikes = array();
            foreach ($post->plike()->get() as $plike) {
                $userlikes[$plike->User()->first()->id] =  $plike->User()->first()->toArray();
            }

            $is_owner = false;
            $keywords = $post->Keywords->all();
            $posts = array();
            foreach ($keywords as  $value) {
                $p = Post::whereHas('keywords', function ($q) use ($value) {
                    $q->where('key', "=", $value->key);
                });

                $p = $p->get()->toArray();

                $posts = array_merge($posts, $p);
            }
            $presult = array();
            $ptags = array();
            foreach ($posts as $key => $value) {
                if (!in_array($value, $presult)) {
                    $presult[] = $value;
                    $ptags[$value["id"]] = Post::find($value["id"])->Tags()->get()->toArray();
                }
            }
            // get tags

            if ($post->User->id == auth()->user()->id) $is_owner = true;
            return view("problem")->with(['post' => $post, 'imgs' => $post->Images()->get(), 'id' => $id, 'comments' => $post->Comments(), "is_owner" => $is_owner, 'suggested' => $presult, "suggested_tags" => $ptags, "userlikes" => $userlikes]);
        } else {
            return $id;
        }
    }
    public function LikePost(Request $request, $id)
    {
        $user = Auth::user();

        $like = Userplike::where("user_id", "=", $user->id)->where("post_id", "=", $id)->first();
        if ($like == null) {
            $like = new Userplike;
            $like->post_id = $id;
            $like->user_id = $user->id;
            $like->save();
        } else {
            $like->delete();
        }

        return redirect()->route("problem", ["id" => $id]);
    }
    public function getNotifications(Request $request)
    {
        return auth()->user()->unreadNotifications;
    }
    public function addComment(Request $request, $id)
    {
        // user - post - image
        $user = auth()->user();
        $post = Post::find($id);
        $post->User;
        if ($post->User->id == $user->id)
            return back()->withErrors(["error"]);
        $comment = new Comment;
        $comment->description = $request->body_problem;
        $post->Comments()->save($comment);
        $user->Comments()->save($comment);
        $comment->Images()->saveMany($this->serlize_img($request->images));
        $details = [
            'user_id' => $user->id,
            'post_id' => $id,
            'comment_id' => $comment->id,
        ];

        Notification::send($post->User, new PostAnswerNotification($details));
        return  back();
    }
    public function subcomment(Request $request, $id)
    {
        $comment = Comment::find($request["commentId"]);
        $subcomment = new Subcomment;
        $subcomment->description = $request["comment"];
        $comment->Subcomments()->save($subcomment);
        auth()->user()->Subcomments()->save($subcomment);
        return "success";
    }
    public function EditPost(Request $request, $id)
    {
        $user = auth()->user();
        $post = Post::where("id", $id)->first();
        $post->title = $request->title;
        $post->description = $request->body_problem;
        $post->Images;
        $post->Images()->delete();
        $post->Images()->saveMany($this->pserlize_img($request->images));
        $post->save();
        return Redirect()->route("problem", [$id]);
    }
}
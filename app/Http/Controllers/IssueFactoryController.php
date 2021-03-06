<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class IssueFactoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except("home");
    }
    public function Index(Request $request)
    {
        return view("createIssue");
    }
    public function serlize_img($imgs)
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
    public function serlize_tag($tags)
    {
        $_tags = array_filter(explode(',', $tags));
        return $_tags;
    }
    public function CreateIssue(Request $request)
    {
        //devicon-csharp-plain colored
        //INSERT INTO `tags` (`id`, `name`, `Icon`) VALUES (NULL, 'csharp', 'devicon-csharp-plain colored'), (NULL, 'javascript', 'devicon-csharp-plain colored');
        //dd($request->all());
        $user = auth()->user();
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->body_problem;
        $user->Posts()->save($post);
        $post->Images()->saveMany($this->serlize_img($request->images));
        $post->Keywords()->sync($this->serlize_tag($request->keywords));
        $post->Tags()->sync($this->serlize_tag($request->tags));
        return redirect()->route('problems');
    }
    public function inbox(Request $request)
    {
        $posts = Auth::user()->Posts;
        foreach ($posts as $value) {
            $value->Tags;
            $value->Comments;
            $value->plike;
        }
        return view("inbox")->with(["posts" => $posts->all()]);
    }
}
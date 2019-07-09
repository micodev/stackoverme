<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CreatedIssueController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except("home");
    }
    public function Index(Request $request,$id)
    {
        $post = Post::find($id);
        if($post!=null)
        {
            return view("problem")->with(['post'=> $post,'imgs'=>$post->Images()->get()]);
        }
        else {
            return $id;
        }

    }
}

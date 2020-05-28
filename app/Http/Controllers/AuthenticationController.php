<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Rules\username;
use Auth;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('profile');
    }
    private function Validate_username_email($input)
    {
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return "email";
        } elseif (1 == preg_match('/^[A-Za-z]{1}[A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $input)) {
            return "username";
        } else
            return "notdefiend";
    }
    public function Index(Request $request)
    {
        $search = Cookie::get('search');
        $posts = array();
        if ($search == null) {
            $posts = Post::orderBy('like', 'desc')->take(5)->get();
            foreach ($posts as $value) {
                $value->User;
                $value->Tags;
                $value->created_at = $value->created_at->toDateString();
            }
            $posts = $posts->toArray();
        } else {
            $explode_search = (array) json_decode($search);
            $posts = Post::whereHas('keywords', function ($q) use ($explode_search) {
                $q->where(function ($q) use ($explode_search) {

                    foreach ($explode_search as  $value) {
                        $q->orWhere("key", 'LIKE', '%' . $value . '%');
                    }
                });
            })->orderBy('like', 'desc')->take(5)->get();
            foreach ($posts as $value) {
                $value->User;
                $value->Tags;
                $value->created_at = $value->created_at->toDateString();
            }
            $post_key = $posts->toArray();
        }
        return view("main")->with(["posts" => $posts]);
    }
    public function Search(Request $request)
    {
        $search = $request->only("search");
        if (array_key_exists("search", $search)) {
            $search = $search["search"];
            if ($search == null)
                return redirect()->back();
            $explode_search = explode(" ", $search);
            $post_exactly = Post::where("title", '=', $search)->get();
            foreach ($post_exactly as $key => $value) {
                $value->User;
                $value->Tags;
            }
            $post_exactly = $post_exactly->toArray();
            $post_like_search = Post::where("title", 'LIKE', '%' . $search . '%')->get();
            foreach ($post_like_search as $key => $value) {
                $value->User;
                $value->Tags;
            }
            $post_like_search = $post_like_search->toArray();
            $post_key = Post::whereHas('keywords', function ($q) use ($explode_search) {
                $q->where(function ($q) use ($explode_search) {

                    foreach ($explode_search as  $value) {
                        $q->orWhere("key", 'LIKE', '%' . $value . '%');
                    }
                });
            })->get();
            foreach ($post_key as $key => $value) {
                $value->User;
                $value->Tags;
            }
            $post_key = $post_key->toArray();
            $post_like_search_unique = array();
            foreach ($post_like_search as $value) {
                if (!in_array($value, $post_exactly)) {
                    $post_like_search_unique[] = $value;
                }
            }
            $post_key_uniquef = array();
            foreach ($post_key as $value) {
                if (!in_array($value, $post_exactly)) {
                    $post_key_uniquef[] = $value;
                }
            }
            $post_key_uniquefinal = array();
            foreach ($post_key_uniquef as $value) {
                if (!in_array($value, $post_like_search_unique)) {
                    $post_key_uniquefinal[] = $value;
                }
            }
            $cookie = $this->set_search_cookie($explode_search);
            Cookie::queue('search', $cookie, 450000);

            return view("searchResult")->with(["pe" => $post_exactly, "pls" => $post_like_search_unique, "pk" => $post_key_uniquefinal]);
        } else {
            return redirect()->back();
        }
    }
    public function set_search_cookie($query)
    {
        $search = Cookie::get('search');
        if ($search == null) {
            return json_encode((array) $query);
        } else {
            $search = array_merge($query, (array) json_decode($search));
            $search = array_unique($search);
            return json_encode((array) $search);
        }
    }
    /*
    public function Login(Request $request)
    {
        $request = $request->only('username','password');
        $username = $request['username'];
        $password =$request['password'] ;
        $isvalid = $this->Validate_username_email($username);
        if($isvalid =="username")
       {
           if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password, 'status' => 'active'])) {
            return  dd("wow"); //"success";
           }
           else {
             return  dd("wow"); //"failed username password";
           }
       }
       elseif ($isvalid =="email") {
        if (Auth::guard('admin')->attempt(['email' => $username, 'password' => $password, 'status' => 'active'])) {
            return  dd("wow"); //"success";
        }
        else {

               return   dd("wow"); // "failed email password";
           }
       }
       else
       dd("wow");



    }
    */
    public function login(Request $request)
    {

        $request = $request->only('username', 'password');
        $username = $request['username'];
        $password = $request['password'];
        $isvalid = $this->Validate_username_email($username);

        if ($isvalid == "username") {
            if (auth()->attempt(['username' => $username, 'password' => $password])) {
                return   back()->with(["successful" => "you have succefully logined !"]);
            } else {
                return  back()->withErrors(["username" => "you have issue in username / password"]);
            }
        } elseif ($isvalid == "email") {
            if (auth()->attempt(['email' => $username, 'password' => $password])) {
                return   back()->with(["successful" => "you have succefully logined !"]);
            } else {

                return    back()->withErrors(["username" => "you have issue in email or password"]);
            }
        } else
            back()->withErrors(["username" => "you have issue in email or password"]);





        // if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
        //     if(auth()->user()->confirmed==0){
        //         Auth::logout();
        //         return back()->withErrors(['warning'=>'Your account has not yet been activated. Please check Your email']);
        //     }
        //     return redirect(route('app.index'));
        // }
        // else {
        //     return   back()->withErrors(['warning'=>'Address email or/and password are incorrect.']);
        // }
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'min:3|max:9|regex:/^[a-zA-Z]+$/u',
            'lastname' => 'min:3|max:9|regex:/^[a-zA-Z]+$/u',
            'reusername' => ['unique:users,username', new username],
            'email' => 'email|unique:users',
            'password' => 'required|string|min:6'
        ]);
        $request = $request->only('reusername', 'password', 'firstname', 'lastname', 'email');
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $username = $request['reusername'];
        $email = $request['email'];
        $password = $request['password'];
        if ($this->Validate_username_email($username) == "username" && $this->Validate_username_email($email) == "email") {

            User::create([
                'name' => $firstname . " " . $lastname,
                'username' => strtolower($username),
                'email' => strtolower($email),
                'password' => Hash::make($password),
            ]);
            if (auth()->attempt(['username' => $username, 'password' => $password])) {
                return back()->with(["successful" => "you have succefully registered !"]);
            } else {
                return back()->withErrors(["registerError" => "There's problem with the login ."]);
            }
        }
    }
    public function editProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:3|max:19|regex:/^[a-zA-Z ]+$/u',
            'username' => [ new username],
            'email' => 'email',
        ]);

        if(auth()->user()->username != $request->username || auth()->user()->email!=$request->email ){
            $users = User::where('id', '!=', auth()->id())
                        ->where('username',$request->username)
                        ->orwhere('email',$request->email)
                        ->where('id', '!=', auth()->id())
                        ->get();
            if(count($users)>0)
                return response()->json(["errors"=>["there is already user with that username or email."]],502);
        }
        $request = $request->only("name","username","email");

        if(!array_key_exists("name",$request) || !array_key_exists("username",$request) || !array_key_exists("email",$request)){
            return response()->json(["errors"=>["paramters required is missing."]],502);
        }

        $user = auth()->user();
        $user->fill($request);
        $user->save();
        return response()->json($request,200);

    }
}

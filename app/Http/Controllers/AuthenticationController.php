<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use App\User;

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
   private function Validate_username_password($input) {
    if( filter_var($input, FILTER_VALIDATE_EMAIL))
    {
        return "email";
    }
    elseif (1==preg_match('/^[A-Za-z]{1}[A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$input)) {
      return "username";
    }
    else
    return "notdefiend";
   }
    public function Index(Request $request)
    {

        return view("main");
    }
    /*
    public function Login(Request $request)
    {
        $request = $request->only('username','password');
        $username = $request['username'];
        $password =$request['password'] ;
        $isvalid = $this->Validate_username_password($username);
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
     public function login(Request $request){

        $request = $request->only('username','password');
        $username = $request['username'];
        $password =$request['password'] ;
        $isvalid = $this->Validate_username_password($username);

        if($isvalid =="username")
       {
           if (auth()->attempt(['username' => $username, 'password' => $password])) {
            return  dd("wow_username"); //"success";
           }
           else {
             return  dd("wow_error_username"); //"failed username password";
           }
       }
       elseif ($isvalid =="email") {
        if (auth()->attempt(['email' => $username, 'password' => $password])) {
            return  dd("wow_email"); //"success";
        }
        else {

               return   dd("wow_error_email"); // "failed email password";
           }
       }
       else
       dd("wow_noemail_username");





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
        $this->validate($request,[
            'username'=>'unique:users',
            'email'=> 'email|unique:users',
            'password'=>'required|string|min:6'
        ]);
        $request = $request->only('username','password','firstname','lastname','email');
        $firstname = $request['firstname'];
        $lastname =$request['lastname'];
        $username = $request['username'];
        $email = $request['email'];
        $password =$request['password'];
        if($this->Validate_username_password($username) && $this->Validate_username_password($email))
        {
            User::create([
                'name' => $firstname." ".$lastname,
                'username'=>strtolower($username),
                'email' =>strtolower($email),
                'password' => Hash::make($password),
            ]);
            if(auth()->attempt(['username' => $username, 'password' => $password]))
            {
                return back()->with(["successful"=>"you have succefully registered !"]);
            }
            else {
                return back()->withErrors(["registerError"=>"There's problem with the login ."]);
            }

        }

    }
}

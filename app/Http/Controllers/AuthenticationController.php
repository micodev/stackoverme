<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
   public function __construct()
   {
      
   }
    public function Index(Request $request)
    {
        return view("main");
    }
}

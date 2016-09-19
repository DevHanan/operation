<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;


class UserController extends Controller
{


//**************************Register************************************//

    public function postRegister(Request $request)
    {
        $user_name = $request->input('user_name');
        $email = $request->input('email');
        $password = $request->input('password');

        //sign up validation

        $rules = array(
            'user_name' => 'required|max:30',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return redirect('pages/signup')->withErrors($validator);
        }
    else
    {
      DB::table('users')->insert(['name'=>$user_name,'email'=>$email,'password'=>$password]);
      return redirect('home');
  }
     }
//**************************Login************************************//

    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        //login validation

        $rules = array(
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return redirect('pages/login')->withErrors($validator);
        }
       $user=DB::table('users')->where('email',$email)->first();
       if(is_null($user))
        return redirect ('pages/login');
    else
        return redirect('home');
    }

//**************************Logout************************************//

    public function logout()
    {
        Session::flush();
        return view('pages/login');
    }
     
 }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Ixudra\Curl\Facades\Curl;

class UserController extends Controller
{
    public function postRegister(Request $request)
    {
        $user_name = $request->input('user_name');
        $email = $request->input('email');
        $password = $request->input('password');

        $data = array(
            'name' => $user_name,
            'email' => $email,
            'pass' => $password,
            'action' => 'signup'
        );

        $this->apiConnection($data);

    }

    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = array(
            'email' => $email,
            'pass' => $password,
            'action' => 'login'
        );

        $this->apiConnection($data);

    }

}

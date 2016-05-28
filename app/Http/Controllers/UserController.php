<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
//**************************Register************************************//

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
//**************************Login************************************//

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

//**************************ForgetPassword************************************//

    public function postForgetPassword(Request $request)
    {
        $email = $request->input('email');

        $data = array(
            'email' => $email,
            'action' => 'generate_reset_token'
        );

        $this->apiConnection($data);
    }

//**************************ChangePassword************************************//

    public function postChangePassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $token = Input::get('token');

        $data = array(
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
            'token' => $token,
            'action' => 'change_password'
        );

        $this->apiConnection($data);
    }

}

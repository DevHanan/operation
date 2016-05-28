<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
class UserController extends Controller {

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
        $response = $this->apiConnection($data);
        var_dump($response);
    }
//**************************Login************************************//

    public function postLogin(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $data = array(
            'email' => $email,
            'pass' => $password,
            'action' => 'login'
        );
        $response = json_decode($this->apiConnection($data), true);
        //var_dump($response);
        if ($response['status'] == 200) {
                session(['name' => $response['user_name']]);
                session(['email' => $email]);
                session(['user_id' => $response['user_id']]);
                return view('pages/home');
        } else {
            return Redirect::to('pages/login');
        }
    }
    public function logout(){
        Session::flush();
        return view('pages/home');
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

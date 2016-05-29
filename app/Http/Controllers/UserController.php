<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class UserController extends Controller {

//**************************Register************************************//

    public function postRegister(Request $request) {
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
//        var_dump($response);
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
//        var_dump($response);
        if ($response['status'] == 200) {
            session(['name' => $response['user_name']]);
            session(['email' => $email]);
            session(['user_id' => $response['user_id']]);
            return view('pages/home');
        } else {
            return view('pages/login');
        }
    }

    public function logout() {
        Session::flush();
        return view('pages/home');
    }

//**************************ForgetPassword************************************//
    public function postForgetPassword(Request $request) {
        $email = $request->input('email');

        $data = array(
            'email' => $email,
            'action' => 'generate_reset_token'
        );

        $this->apiConnection($data);
    }

//**************************ChangePassword************************************//

    public function postChangePassword(Request $request) {
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

//**************************UserProfile************************************//

    public function getUserProfile() {
        $user_id = Session::get('user_id');
        $data = array(
            'user_id' => $user_id,
            'action' => 'get_profile'
        );
        $response = json_decode($this->apiConnection($data), true);
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            return view('pages.user_profile')->with('data', $mydata);
        }
    }

//**************************InviteUsers************************************//
    public function postInviteUser(Request $request)
    {
        $admin_email = $request->input('admin_email');
        $admin_password = $request->input('admin_password');
        $invited_emails = $request->input('invited_emails');

        $data = array(
            'admin_email' => $admin_email,
            'admin_password' => $admin_password,
            'invited_emails' => $invited_emails,
            'action' => 'invite_users'
        );

        $this->apiConnection($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

use Session;
//use Mailgun;
use Mail;
use Validator;

class UserController extends Controller
{

    static $module = 'member';

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
        $response = $this->apiConnection($data, UserController::$module);
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
        $response = json_decode($this->apiConnection($data, UserController::$module), true);
        //var_dump($response);
        if ($response['status'] == 200) {
            session(['name' => $response['user_name']]);
            session(['email' => $email]);
            session(['user_id' => $response['user_id']]);
            return view('pages/home');
        } else {
            return view('pages/login');
        }
    }

    public function logout()
    {
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
        $response = json_decode($this->apiConnection($data, UserController::$module), true);

        if ($response['status'] == 200) {
            $url = "http://www.sendemail.xyz/script.php";
            $fields = array(
                'email' => $email,
                'subject' => 'Rest Password',
                'content' => 'to reset Your password please visit http://www.iti2016.xyz/pages/change_password/' . $response['token']

            );
            $fields_string = null;
            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }
            $response = Curl::to($url)
                ->withData($fields)
                ->post();
            var_dump($response);
        }

        /*if ($response['status'] == 200) {
            $mymessage = array(
                'email' => $email,
                'url' => 'http://localhost:8000/pages/change_password/' . $response['token'],
            );
            Mail::send('pages.forget_password_message', $mymessage, function ($message) use(&$email) {
                $message->from('a.fayad700@gmail.com', 'Rest Password');
                $message->to($email)->subject('Rest Password Email');
            });
        }
        else {
            var_dump($response);
        }*/
    }

//**************************ChangePassword************************************//

    public function postChangePassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $token = $request->input('token');
        $data = array(
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
            'token' => $token,
            'action' => 'change_password'
        );

        $response = $this->apiConnection($data, UserController::$module);
        var_dump($response);
    }

//**************************UserProfile************************************//

    public function getUserProfile()
    {
        $user_id = Session::get('user_id');
        $data = array(
            'user_id' => $user_id,
            'action' => 'get_profile'
        );
        $response = json_decode($this->apiConnection($data, UserController::$module), true);
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            return view('pages.user_profile')->with('data', $mydata);
        }
    }

//**************************InviteUsers************************************//
    public function postInviteUser(Request $request)
    {
        //$admin_email = $request->input('admin_email');
        $admin_email = Session::get('email');
        $admin_password = $request->input('admin_password');
        $invited_emails = $request->input('invited_emails');

        $data = array(
            'admin_email' => $admin_email,
            'admin_password' => $admin_password,
            'invited_emails' => $invited_emails,
            'action' => 'invite_users'
        );
        $response = json_decode($this->apiConnection($data, UserController::$module), true);
        //var_dump($response['emails']);die();
        $signUp_emails = $response['emails']['signup'];
        // $login_emails = $response['emails']['login'];
        if ($response['status'] == 200) {
            foreach ($signUp_emails as $email) {

                $signUpMessage = array(
                    'invited_email' => $email,
                    'url' => 'http://localhost:8000/pages/invite_user',
                );
                Mail::send('pages.inviteUsers_message', $signUpMessage, function ($message) use ($email) {
                    $message->from('site_admin@gmail.com', 'Invite User');
                    $message->to($email)->subject('Invite User Email');
                });
            }

//            foreach($login_emails as $email){
//
//                $loginMessage = array(
//                    'invited_email' => $email,
//                    'url' => 'http://localhost:8000/pages/invite_user',
//                );
//                Mail::send('pages.inviteUsers_message',$loginMessage,function($message) use(&$login_emails){
//                    $message->from('site_admin@gmail.com','Invite User');
//                    $message->to($login_emails)->subject('Invite User Email');
//                });
//            }


        }
    }

//**************************getTeamMembers************************************//
    public function getTeamMembers()
    {
        $user_email = Session::get('email');
        $data = array(
            'email' => $user_email,
            'action' => 'get_team_members'
        );

        $response = json_decode($this->apiConnection($data, UserController::$module), true);
        //var_dump($response);die();
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            // var_dump($mydata);die();
            return view('pages.get_teams')->with('data', $mydata);

        }

    }

//**************************Activate & Deactivate User************************************//
    public function userStatues(Request $request)
    {

//        $this->validate($request,[
//            'password' => 'required'
//        ]);

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('get_teams')->withErrors($validator);
        }


//        $team_id = $request->team_id;
//        $user_id = $request->user_id;
//        $admin_id = Session::get('user_id');
//        $admin_password = $request->password;
//
//        $data = array(
//            'team_id' => $team_id,
//            'user_id' => $user_id,
//            'admin_id' => $admin_id,
//            'password' => $admin_password,
//            'action' => 'activateUser_inTeam'
//        );
//        $response = $this->apiConnection($data,UserController::$module);
//        var_dump($response);

        $user_data = $request->all();
        //dd($user_data);
        if ($user_data['is_active'] == 0) {
            $admin_id = Session::get('user_id');
            $data = array(
                'team_id' => $user_data['team_id'],
                'user_id' => $user_data['user_id'],
                'admin_id' => $admin_id,
                'password' => $user_data['password'],
                'action' => 'activateUser_inTeam'

            );
            $response = $this->apiConnection($data, UserController::$module);
            var_dump($response);
        } else {
            if ($user_data['is_active'] == 1) {
                $admin_id = Session::get('user_id');
                $data = array(
                    'team_id' => $user_data['team_id'],
                    'user_id' => $user_data['user_id'],
                    'admin_id' => $admin_id,
                    'password' => $user_data['password'],
                    'action' => 'deactivateUser_inTeam'

                );
                $response = $this->apiConnection($data, UserController::$module);
                var_dump($response);
            }
        }

    }

//    public function deactivateUser(Request $request)
//    {
//        $team_id = $request->team_id;
//        $user_id = $request->user_id;
//        $admin_id = Session::get('user_id');
//        $admin_password = $request->password;
//
//        $data = array(
//            'team_id' => $team_id,
//            'user_id' => $user_id,
//            'admin_id' => $admin_id,
//            'password' => $admin_password,
//            'action' => 'deactivateUser_inTeam'
//        );
//        $response = $this->apiConnection($data,UserController::$module);
//        var_dump($response);
//
//    }

//**************************Get Teams Invited IN************************************//

    public function getTeamsInvitedIn()
    {
        $user_email = Session::get('email');
        $data = array(
            'user_email' => $user_email,
            'action' => 'getTeamsInvitedIn'
        );

        $response = json_decode($this->apiConnection($data,UserController::$module),true);
        //var_dump($response);die();
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            return view('pages.pending_invitations')->with('data', $mydata);
        }

    }
}

/*
        $data = array(
            'customer' => 'Amrfayad',
            'url' => 'http://laravel.com'
        );

        Mail::send('pages.welcome', $data, function ($message) {
            $message->from('testtest@gmail.com', 'Learning Laravel');
            $message->to('amr.fci2007@gmail.com')->subject('Learning Laravel test email');
        });
        return "Your email has been sent successfully";



        /* $user = array();
          $user['email'] = Session::get('user_email');
          $user['name'] = Session::get('user_name');
          $data = array(
          'customer' => 'Amrfayad',
          'url' => 'http://laravel.com'
          );
          /*Mailgun::send('pages.welcome', $data, function($message) {
          $message->to('amr.fci2007@gmail.com', 'Amr fayad')->subject('Welcome!');
          });
          Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
          $m->from('hello@app.com', 'Your Application');
          $m->to($user['email'], $user['name'])->subject('Your Reminder!');
          });  //die();
  */





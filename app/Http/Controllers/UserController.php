<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

use Session;

//use Mailgun;
use Mail;
use Validator;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{

    static $module = 'member';

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

        $data = array(
            'name' => $user_name,
            'email' => $email,
            'pass' => $password,
            'action' => 'signup'
        );

        $response = json_decode($this->apiConnection($data, UserController::$module),true);
        if ($response['status'] == 200) {
            session(['name' =>  $user_name]);
            session(['email' => $email]);
            session(['user_id' => $response['user_id']]);
            return view('pages/home');
        } else {
            return view('pages/register');
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

//**************************Logout************************************//

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
            $mymessage = array(
                'email' => $email,
                //'url' => 'http://localhost:8000/pages/change_password/' . $response['token'],
                'url' =>  'http://www.iti2016.xyz/pages/change_password/' . $response['token'] ,
            );
            Mail::send('pages.forget_password_message', $mymessage, function ($message) use(&$email) {
                $message->from('site_admin@gmail.com', 'Rest Password');
                $message->to($email)->subject('Rest Password Email');
            });
            return view('pages/home');
        }
        else {
            return view('pages/404');
        }
    }

//**************************ChangePassword************************************//

    public function postChangePassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        // change password validation
        $rules = array(

            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return redirect('pages.change_password')->withErrors($validator);
        }

        $token = $request->input('token');
        $data = array(
            'email' => $email,
            'password' => $password,
            'token' => $token,
            'action' => 'change_password'
        );
        $response = $this->apiConnection($data, UserController::$module);
        if($response['status'] == 200)
        {
            return view('pages/home');
        }else{
            return view('errors/404');
        }
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
        }else{
            return view('errors/404');
        }
    }

//**************************InviteUsers************************************//

    public function postInviteUser(Request $request)
    {
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
        if($response['status'] == 200)
        {
            
            $emails = $response['emails'];
            $team_id = $response['team_id'];
            $mails = array();
            foreach($emails as $email){
                    $invited =  preg_replace( "/\r|\n/", "", $email['invited_email'] );
                    $mymessage = array(
                            'email' =>$admin_email,
                            'invited' => $invited ,
                            //'url' =>  'http://localhost:8000/pages/'.$email['url'].'/'.$team_id ,
                            'url' =>  'http://www.iti2016.xyz/pages/'.$email['url'].'/'.$team_id ,
                    );
                    Mail::send('pages.inviteUsers_message', $mymessage, function ($message) use($invited) {
                       
                        $message->from('site_admin@gmail.com', 'Site Admin');
                        $message->to($invited)->subject('Join My Team');
                    });
                }
                 return view('pages/home');
             }
            else {
                return view('errors/406');
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
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            return view('pages.get_teams')->with('data', $mydata);

        }

    }

//**************************Activate & Deactivate User************************************//
    public function userStatues(Request $request)
    {

        $user_data = $request->all();

        if ($user_data['action'] == 'activate') {

            $admin_id = Session::get('user_id');
            $data = array(
                'team_id' => $user_data['team_id'],
                'user_id' => $user_data['user_id'],
                'admin_id' => $admin_id,
                'password' => $user_data['password'],
                'action' => 'activateUser_inTeam'

            );
            $response = $this->apiConnection($data, UserController::$module);
            echo $response;
        } else {
            if ($user_data['action'] == 'deactivate') {

                $admin_id = Session::get('user_id');
                $data = array(
                    'team_id' => $user_data['team_id'],
                    'user_id' => $user_data['user_id'],
                    'admin_id' => $admin_id,
                    'password' => $user_data['password'],
                    'action' => 'deactivateUser_inTeam'
                );
                $response = $this->apiConnection($data, UserController::$module);
                echo $response;
            }
        }

    }

//************************** Assign Billing ************************************//

    public function assign_billing(Request $request)
    {
        $user_data = $request->all();
        if($user_data['action'] == 'assign_billing')
        {

            $data = array(
                'team_id' => $user_data['team_id'],
                'pass' => $user_data['password'],
                'user_id' => $user_data['user_id'],
                'action' => 'assign_billing'
            );
            $response = $this->apiConnection($data, UserController::$module);
            echo $response;
        }
    }


//**************************Get Teams Invited IN************************************//

    public function getTeamsInvitedIn()
    {
        $user_email = Session::get('email');
        $data = array(
            'user_email' => $user_email,
            'action' => 'getTeamsInvitedIn'
        );
        $response = json_decode($this->apiConnection($data,UserController::$module),true);
        if ($response['status'] == 200) {
            $mydata = $response['data'];
            return view('pages.pending_invitations')->with('data', $mydata);
        }

    }

//************************** Accept Invitation************************************//

    public function accept_invitation(Request $request)
    {
        $user_data = $request->all();
        if($user_data['action'] == 'accept_invitation')
        {
            $user_email = Session::get('email');
            $data = array(
                'email' => $user_email,
                'pass' => $user_data['password'],
                'team_id' => $user_data['team_id'],
                'action' => 'accept_invitation'
            );
            $response =$this->apiConnection($data, UserController::$module);
            echo $response;
        }
    }
//************************** Decline Invitation************************************//

    public function decline_invitation(Request $request)
    {
        $user_data = $request->all();

        if($user_data['action'] == 'decline_invitation')
        {
            $user_email = Session::get('email');
            $data = array(
                'email' => $user_email,
                'pass' => $user_data['password'],
                'team_id' => $user_data['team_id'],
                'action' => 'remove_invation'
            );
            $response =$this->apiConnection($data, UserController::$module);
            echo $response;
        }
    }

//************************** Change Password without token ************************************//

    public function postChangeMyPassword(Request $request){
        $email = Session::get('email');
        $oldpassword = $request->input('oldpassword');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        // change password validation
        $rules = array(
            'oldpassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return redirect('pages/change_my_password/')->withErrors($validator);
        }
        $data = array(
            'email' => $email,
            'old_password' => $oldpassword,
            'password' => $password,
            'action' => 'change_password'
        );
        $response = json_decode($this->apiConnection($data, UserController::$module),true);
        if($response['status'] == 200)
        {
            return view('pages.home');
        }else{
            return view('errors/406');
        }
    }
 }

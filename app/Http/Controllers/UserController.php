<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

use Session;
//use Mailgun;
use Mail;
use Validator;

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
        $response = json_decode($this->apiConnection($data),true);
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
        $response = json_decode($this->apiConnection($data), true);
        
        if ($response['status'] == 200) {
        $url = "http://www.sendemail.xyz/script.php";
        //$url = "http://localhost/sendemail/script.php";
            $fields = array(
                'email' => $email , 
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
         }
    }

//**************************ChangePassword************************************//

    public function postChangePassword(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $token = $request->input('token');
        $data = array(
            'email' => $email,
            'password' => $password,
            'token' => $token,
            'action' => 'change_password'
        );

        $response = $this->apiConnection($data);
        var_dump($response);
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
    public function postInviteUser(Request $request) {
        $admin_email = Session::get('email');
        $admin_password = $request->input('admin_password');
        $invited_emails = $request->input('invited_emails');

        $data = array(
            'admin_email' => $admin_email,
            'admin_password' => $admin_password,
            'invited_emails' => $invited_emails,
            'action' => 'invite_users'
        );
        $response = json_decode($this->apiConnection($data), true);
        if($response['status'] == 200)
        {
            
            $emails = $response['emails'];
            $team_id = $response['team_id'];
            $mails = array();
            $url = "http://www.sendemail.xyz/emails.php";
            //$url = "http://localhost/sendemail/emails.php";
                    
            foreach($emails as $email){
                     $mail = array(
                        //'to' => $email['invited_email'] , 
                        'subject' => 'Join My Team',
                        'content' =>  'Hello '.$email['invited_email']."\n\r".
                                       $admin_email .' invited you to Join his team '.
                                       "\n\r" .'to accept his invitation please visit http://www.iti2016.xyz/pages/'.$email['url'] .'/'. $team_id
                      );
                    $key = preg_replace( "/\r|\n/", "", $email['invited_email'] );
                    $mails[$key]=$mail;
             }
             $fields = array(
                'mails' => $mails,
             );
            $curl = Curl::to($url)
                    ->withData($fields)
                    ->post();
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

        $response = json_decode($this->apiConnection($data), true);
       //var_dump($response);die();
        if ($response['status'] == 200) {
          $mydata = $response['data'];
          // var_dump($mydata);die();
            return view('pages.get_teams')->with('data', $mydata);

        }

    }

//**************************Activate & Deactivate User************************************//
    public function activateUser(Request $request)
    {

        $this->validate($request,[
            'password' => 'required'
        ]);

//        $validator = Validator::make($request->all(),[
//            'password' => 'required',
//        ]);
//
//        if($validator->fails())
//        {
//            return redirect('get_teams')->withErrors($validator);
//        }



        $team_id = $request->team_id;
        $user_id = $request->user_id;
        $admin_password = $request->password;

        $data = array(
            'team_id' => $team_id,
            'user_id' => $user_id,
            'password' => $admin_password,
            'action' => 'activateUser_inTeam'
        );

        $response = $this->apiConnection($data);
        var_dump($response);

    }

    public function deactivateUser()
    {

    }
    
    
    
    public function postChangeMyPassword(Request $request){
        $email = Session::get('email');
        $oldpassword = $request->input('oldpassword');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $data = array(
            'email' => $email,
            'old_password' => $oldpassword,
            'password' => $password,
            'action' => 'change_password'
        );
        $response = $this->apiConnection($data);
        var_dump($response);
    }
 }
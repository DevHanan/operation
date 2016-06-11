<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationsController extends Controller
{
    //
        static $module = 'payment';

    public function subscriptionActivated(Request $request){
        
        $input = $request->all();
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $data = array(
            'team_id' => 2 ,
            'plan_name' => 'CRM Gold',
            'other_information' => '{
                                    beginDate :
                                    endDate :
                                    tagString :
                                    productName :
                                    url:
                                    totalPrice:
                                    terms:
                                    tagString:
                                    tagNameString:
                                    statusReason:
                                    status:
                                    siteName:
                                    quantity:
                                    nextPeriodDate:

                            }',
              'action' => "Record_Payment"
            );
        $response = json_decode($this->apiConnection($data, NotificationsController::$module),true);
        if($response['status'] == 200)
        {
            return "Subscription Activated";
        }
        else{
            return $response['message'];
        }
    }
     public function subscriptionDeactivated(Request $request){
        $input = $request->all();
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        
        $data = array(
            'team_id' => 2 ,
            'action' => "record_failed_payment"
            );
        $response = json_decode($this->apiConnection($data, NotificationsController::$module),true);
        if($response['status'] == 200)
        {
         return "Subscription Deactivated"; 
        }
        else{
            return $response['message'];
        }
     }
     public function subscriptionChanged(Request $request){
        $input = $request->all();
       /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "changed.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($input as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
         }
        fclose($data);
         return "Subscription Changed"; 
   
    }
     public function paymentFailed(Request $request){
         $input = $request->all();       
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "failed.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($input as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
                  }
        fclose($data);
        return "Payement Failed"; 
   }
    
}

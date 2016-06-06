<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationsController extends Controller
{
    //
    public function subscriptionActivated(){
        
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "active.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($_REQUEST as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
         }
        fclose($data);
        
        return "Subscription Activated"; 
    }
     public function subscriptionDeactivated(){
        
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "deactive.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($_REQUEST as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
         }
        fclose($data);
         return "Subscription Deactivated"; 
   
    }
     public function subscriptionChanged(){
        
       /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "changed.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($_REQUEST as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
         }
        fclose($data);
         return "Subscription Changed"; 
   
    }
     public function paymentFailed(){
        
        /*$privatekey = "82ee30b29867559d76c9f1d127725e8e";
        if (md5($_REQUEST["security_data"] . $privatekey) != $_REQUEST["security_hash"]) {
            return "Invalid data"; 
        }*/
        $file = "failed.txt";
        $data = fopen($file, "a") or die("Can't open file.");
        foreach ($_REQUEST as $key => $value) {
                     fwrite($data, $key);
                     fwrite($data,"=");
                     
                     fwrite($data, $value);
                     fwrite($data,"\n");
                     
                  }
        fclose($data);
        return "Payement Failed"; 
   }
    
}

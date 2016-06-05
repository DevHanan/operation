<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationsController extends Controller
{
    //
    public function subscriptionActivated(){
        
        return "Subscription Activated"; 
    }
     public function subscriptionDeactivated(){
        
         return "Subscription Deactivated"; 
   
    }
     public function subscriptionChanged(){
        
         return "Subscription Changed"; 
   
    }
     public function paymentFailed(){
         return "Payement Failed"; 
   }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Ixudra\Curl\Facades\Curl;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function apiConnection($data,$module)
    {
        $hashed_array = $data;
        $key = 'mjHr8Kc7LQ3twxXIVCFSl5#cMf#6bUSv';
        $hashed_array['key'] = $key;

        $hash = md5(implode("", $hashed_array));
        $url = "http://localhost/SaaSBase/$module";
//        $url = "http://www.saasbase.xyz/$module";
        $fields = array(
            'data' => json_encode($data),
            'hash' => $hash,
        );
        $response = Curl::to($url)
            ->withData($fields)
            ->post();
        return $response;
    }
}

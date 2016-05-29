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

    public function apiConnection($data)
    {
        $hashed_array = $data;
        $key = 'mjHr8Kc7LQ3twxXIVCFSl5#cMf#6bUSv';
        $hashed_array['key'] = $key;

        $hash = md5(implode("", $hashed_array));
        $url = "http://127.0.0.1/SaaSBase/member";

        $fields = array(
            'data' => json_encode($data),
            'hash' => $hash,
        );
        $fields_string = null;
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }

        $response = Curl::to($url)
            ->withData($fields)
            ->post();
        return $response;

    }
}

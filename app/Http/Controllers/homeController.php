<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class homeController extends Controller {

public function __construct()
{
	$this->middleware('auth');
}

	public function addItem(Request $request) {
		$rules = array (
				'name' => 'required|alpha_num' 
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ())
			return Response::json ( array (
					
					'errors' => $validator->getMessageBag ()->toArray () 
			) );
		else {
			$data = new cat ();
			$data->name = $request->name;
			$data->save ();
			return response ()->json ( $data );
		}
	}
	public function readItems(Request $req) {
		$data = cat::all ();
		return view ( 'home' )->withData ( $data );
	}
	public function editItem(Request $req) {
		$data = cat::find ( $req->id );
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}
	public function deleteItem(Request $req) {
		cat::find ( $req->id )->delete ();
		return response ()->json ();
	}
}

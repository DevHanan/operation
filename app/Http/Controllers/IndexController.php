<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller {

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
			$data = new product ();
			$data->name = $request->name;
			$data->id=1;
			$data->save ();
			return response ()->json ( $data );
		}
	}
	public function editItem(Request $req) {
		$data = product::find ( $req->id );
		$data->name = $req->name;
		$data->save ();
		return response ()->json ( $data );
	}
	public function deleteItem(Request $req) {
		product::find ( $req->id )->delete ();
		return response ()->json ();
	}
}

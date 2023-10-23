<?php

namespace App\Http\Controllers;
use App\Helper\jwtToken;
use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller {
	function login(Request $request) {

		$email = $request->email;
		$user = User::where("email", $email)->first();

		if (isset($user)) {
			$token = jwtToken::createToken($user->name, $user->email);
			return response()->json([
				"status" => 200,
				"data" => "success",
			])->cookie("token", $token, 1);
		} else {
			return "Sorry";
		}
	}
	function getLogin() {
		return "Please Login";
	}

}

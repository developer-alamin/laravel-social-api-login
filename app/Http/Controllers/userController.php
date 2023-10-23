<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;

class userController extends Controller {
	function home() {
		return view("register");
	}
	function profile() {
		return view("profile");
	}
	function Webregister(Request $request) {
		$data = $this->validate($request, [
			"userId" => "required|unique:users,user_id",
			"name" => "required",
			"email" => "required",
			'photo' => 'required|mimes:jpeg,png,jpg',
			"token" => "required",
		], [
			"userId.required" => "Enter User Id",
			"userId.unique" => "User id Already Exits",
			"name.required" => "Enter Name",
			"email.required" => "Enter Email",
			"photo.required" => "Enter Photo",
			"photo.mimes" => "Photo Type Not Access",
			"token.required" => "Enter Token",
		]);

		$file = $request->file("photo");

		if ($file) {
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$filePath = public_path("upload");

			$file->move($filePath, $fileName);
		}

		$create = User::create([
			"user_id" => $data["userId"],
			"nickName" => $request->nickName,
			"name" => $data["name"],
			"email" => $data["email"],
			"avatar" => $fileName,
			"token" => $data["token"],
			"api_name" => "none",
			"expiresIn" => date("Y"),
		]);

		return redirect()->back()->with("success", $create->name . " Your Register Done");
	}
	function googleLogin() {
		return Socialite::driver('google')->redirect();
	}
	function googleCallback() {
		$user = Socialite::driver('google')->user();
		$user_id = $user->id;
		$name = $user->name;
		$email = $user->email;
		$avatar = $user->avatar;
		$token = $user->token;
		$apiName = "google";
		$expiresIn = $user->expiresIn;

		$googleUser = User::where("user_id", $user_id)->count();

		Session::put(["user" => $user]);
		if ($googleUser == 0) {
			$create = User::create([
				"user_id" => $user_id,
				"nickName" => "nickName",
				"name" => $name,
				"email" => $email,
				"avatar" => $avatar,
				"token" => $token,
				"api_name" => $apiName,
				"expiresIn" => $expiresIn,
			]);
			return redirect()->route("profile")->with("success", "Login Success");
		} else {
			return redirect()->route("profile")->with("success", "Login Success");
		}
	}
	function login() {
		return view("login");
	}
	function PostLogin(Request $request) {

		$msg = [
			'userId.required' => 'Please User Id',
			"email.required" => 'Please Email Address',
		];

		$data = $request->validate([
			'userId' => 'required',
			'email' => 'required',
		], $msg);

		$userId = $data["userId"];
		$email = $data["email"];

		$user = User::where("user_id", $userId)->first();

		if (isset($user)) {
			if ($user->email == $email) {
				Session::put(["user" => $user]);
				return redirect()->route("profile")->with("success", "Login Success");
			} else {
				return redirect()->back()->with("faild", "Incrroct Email");
			}
		} else {
			return redirect()->back()->with("faild", "Incrroct User Id");
		}

	}
	function logout(Request $request) {
		$request->session()->flush();
		return redirect(route("home"));
	}
}

<?php

namespace App\Http\Controllers;
use App\Models\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class testController extends Controller {
	function search(Request $request) {

		$search = "test";
		$query = "";
		$match = 'concat(nickName," ",name," ",email) like ?';
		dd($request->session()->get('user'));

		// $query = User::select("name", "email")->whereRaw($match, "%{$search}%")->get();

		//$query->union(test::select("name", "email")->whereRaw($match, "%{$search}%"));
		// $result = $query->getModel()->getTable();
	}

	function test(Request $request) {
		return "Success";
	}

	function logout(Request $request) {
		return response("Logout Success")->cookie('token', '', -1);
	}
}

<?php

namespace App\Http\Middleware;

use App\Helper\jwtToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class verifyToken {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response {
		$token = $request->cookie("token");
		$result = jwtToken::verifyToken($token);
		if ($result == "unauthorized") {
			return redirect(route("login"));
		} else {
			return $next($request);
		}

	}
}

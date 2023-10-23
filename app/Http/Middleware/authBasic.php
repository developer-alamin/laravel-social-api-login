<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class authBasic {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle($request, Closure $next): Response {
		$token = $request->header("token");
		if ($token == "123") {
			return $next($request);
		} else {
			return response()->json([
				"data" => "Sorry",
			]);
		}

	}
}

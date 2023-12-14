<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Library\MyJWT;

class RouteAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];

            $jwt = new MyJWT;

            $auth = $jwt->get_auth_status_from_token($token);

            if ($auth == "true") {
                return $next($request);
            }
        }

        return redirect('unauthorized');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\BasicClient;

use Auth;

class AuthenticateBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $email = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;
        $bearer = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
        $bearer = explode('Bearer ', $bearer);

        if (sizeof($bearer) == 2) {
            $user = Auth::guard('api')->user();

            if (empty($user))
                return showResponseError(401);

            $request->user = $user->toArray();

            return $next($request);
        }

        $client = BasicClient::where(['name' => $email, 'secret' => $password])->first();

        if (empty($client))
            return show(401);

        return $next($request);
    }
}
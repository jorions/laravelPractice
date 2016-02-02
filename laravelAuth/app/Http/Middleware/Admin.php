<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin
{

    /**
     * The Guard implementation
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // COPIED FROM AUTHENTICATE.PHP
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        // ADDED TO CHECK FOR ADMIN
        } else {
            if($this->guard($guard)->admin) {
                return $next($request);
            } else {
                return redirect()->guest('home');
            }
        }
    }
}

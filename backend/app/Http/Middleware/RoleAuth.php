<?php

namespace App\Http\Middleware;

use App\Models\UserTypes;
use App\Traits\HttpResponse;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RoleAuth
{
    use HttpResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type = null): Response
    {
        // return $next($request);
        // Check if the user type is set:
        if (($userTypeId = auth()->user()->user_type) !== null) {
            // Check if the user type true
            if (UserTypes::findOrFail($userTypeId)->type == $type) {
                return $next($request);
            }
        }
        // Return the unauthorize message if false
        return $this->unauthorize();
    }


    /**
     * Using Try and Catch: https://www.itsolutionstuff.com/post/how-to-use-try-catch-exception-in-laravel-appexample.html
     * Extra research source: https://medium.com/@dozieogbo/jwt-authentication-and-role-based-authorization-on-laravel-5-6-and-jwt-auth-6b36e11ed0b0
     * */
}

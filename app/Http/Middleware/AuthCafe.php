<?php


namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use function PHPUnit\Framework\isEmpty;

class AuthCafe extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->query('access_token');
        if (empty($token)) {
            $token = $request->input("access_token");
        }
        if (empty($token)) {
            $token = $request->bearerToken();
        }

        if ($token) return;
        $this->unauthenticated($request, $guards);


    }

}

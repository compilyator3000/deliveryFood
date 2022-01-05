<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use function PHPUnit\Framework\isEmpty;

class AuthenticateAdmin extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token=$request->bearerToken();
        if($token===config('admin_token')[0]) return;
        $this->unauthenticated($request,$guards);


    }

}

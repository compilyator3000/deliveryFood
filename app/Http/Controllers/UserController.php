<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(Request $request){


        $request['password']=password_hash($request['password'],PASSWORD_BCRYPT);
        $create_cafe = User::create($request->toArray());

        return response()->json("data");//response()->json($create_cafe);

    }// response()->json("data")
}

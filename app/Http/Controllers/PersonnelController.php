<?php

namespace App\Http\Controllers;


use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function registration(Request $request){


        $request['password']=password_hash($request['password'],PASSWORD_BCRYPT);
        $create_cafe = Personnel::create($request->toArray());

        return response()->json("data");//response()->json($create_cafe);

    }// response()->json("data")
}

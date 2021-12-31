<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            "email" => "required|email|unique:users,email" ,
            "password" => "required",
            "name" => "required"
        ]);

        $user = User::create(
            [
                "email" => $fields["email"],
                "name" => $fields["name"],
                "password" => bcrypt($fields["password"])
            ]
        );

        $token = $user->createToken($user->email)->plainTextToken;

        return response([
            "user" => $user ,
            "token" => $token
        ]);
        
    }

    public function login(Request $request){
        $fields = $request->validate([
            "email" => "required|email" ,
            "password" => "required"
        ]);

        $user = User::where('email' , $fields['email'])->first() ;
        // return Hash::check()$user->password ;

        if(!$user || !Hash::check($fields['password'] , $user->password)){
            return response(["message" => "wrong creds"] , 403);
        }    

        $token = $user->createToken($user->email)->plainTextToken;

        return response([
            "user" => $user ,
            "token" => $token
        ]);
}
}

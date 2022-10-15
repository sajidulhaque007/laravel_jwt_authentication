<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    
        public function register(Request $request){
            $request->validate([
                "first_name" => 'required|string|between:2,100',
                "last_name"  => 'required|string|between:2,100',
                "email"      => 'required|email|unique:users',
                "password"   => 'required|confirmed|min:6'
            ]);
            $user             = new User();
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->password   = bcrypt($request->password);
            $user->save();
            return response()->json([
                "status"  => 1,
                "message" => "User registered successfully",                
            ]);
            

        }
        
        public function login(Request $request){
            $request->validate([      
                "email"   => "required|email",
                "password"=> "required",
            ]);            
            if(!$token = auth()->attempt(["email" =>$request->email,"password"=>$request->password])){
                return response()->json([
                    "status"  => 0,
                    "message" => "Invalide Credentials"
                ]);
            }
            return response()->json([
                "access_token" => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth()->factory()->getTTL(),
                "message"      => "Logged in successfully",
                'user'         => auth()->user()
            ]);
        }

        public function userProfile(){
            $userData = Auth::user();  
            return response()->json([
                "status"  => 1,
                "message" => "User profile data",
                "data"    => $userData
            ]);    
        }
     
        public function logout(){
             auth()->logout();
             return response()->json([
                 "status"  => 1,
                 "message" => "logged out successfully"
             ]);
        }

      
}

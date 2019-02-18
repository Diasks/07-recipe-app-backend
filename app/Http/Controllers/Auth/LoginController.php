<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use JWTAuth;
use Validator;


class LoginController extends Controller
{

     // Login for registered user, if successfull return JWT-token!
 
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->messages()
            ]);
        }
        try {
            //  attempting to verify the credentials and create token for user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'We can`t find an account with this credentials.'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to login, please try again.'
            ], 500);
        }
        //if everything is working a jwt-token is returned
        return response()->json([
            'status' => 'success',
            'data'=> [
                'token' => $token,
                'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->name
            ]
        ]);
    }
    
 
     // When logging out, destroy token. User have to login again to get a new token.
   
    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            JWTAuth::invalidate($token);
            return response()->json([
                'status' => 'success',
                'message'=> "User successfully logged out."
            ]);
        } catch (JWTException $e) {
            return response()->json([
              'status' => 'error',
              'message' => 'Failed to logout, please try again.'
            ], 500);
        }
    }



}








    


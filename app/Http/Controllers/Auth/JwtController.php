<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtController extends AuthController
{

    protected $username = 'phone';

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('phone', 'password');
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'invalid_credentials', 'code'=>1401]);
        }
        // all good so return the token
        return response()->json(['data'=>compact('token'), 'code'=>200, 'message'=>'ok']);
    }

    public function getAuthenticatedUser()
	{

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['message'=>'user_not_found', 'code'=>404]);
        }

        return response()->json(['data'=>compact('user'), 'message'=>'ok', 'code'=>200]);
        
	}

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['message'=> 'validate_error', 'code'=>1402]);
        }

        $this->create($request->all());

        return $this->authenticate($request);
    }

}

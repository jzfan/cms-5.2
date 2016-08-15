<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtController extends Controller
{

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'invalid_credentials', 'code'=>401]);
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

}

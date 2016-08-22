<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use PhpSms;
use Validator;
use App\User;

class JwtController extends Controller
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',

            'job' => 'required|max:255',

            // 'email' => 'required|email|max:255|unique:users',
            'phone' => ['required', 'unique:users', 'regex:/^1[34578][0-9]{9}$/'],
            'password' => 'required|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'job' => $data['job'],
            // 'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
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

    public function getVerify($phone)
    {
        $plain = rand(1000, 9999);
        PhpSms::make()->to($phone)->template(['YunTongXun'=>config('phpsms.agents.YunTongXun.template_id.wuHanLianZheng')])
                ->data([$plain, '60秒'])
                ->send();
        $hash = bcrypt($plain);
        return response()->json(['code'=>200, 'message'=>'ok', 'hash'=>$hash, 'time'=>time()]);
    }

    public function postVerify(Request $request)
    {
        extract($request->only('time', 'hash', 'verify'));

        if (time() - 60 > $time){
            return response()->json(['code'=>2400, 'message'=>'verify_expired']);
        }

        if (password_verify($verify, $hash)){
            return response()->json(['code'=>200, 'message'=>'ok']);
        }

        return response()->json(['code'=>2401, 'message'=>'verify_error']);
    }

}

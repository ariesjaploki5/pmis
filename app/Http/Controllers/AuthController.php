<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
 
    public function login(Request $request)
    {
        $username = $request->username;
        $selected_password = DB::select("Select top 1 * from hospital.dbo.user_acc where user_name = '$username'");

        $selected_password = User::where('user_name', $username);
        return $selected_password;

        // $credentials = request([$username, $password]);

        // if (! $token = auth('api')->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // return $this->respondWithToken($token);

        
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }
 
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function guard() {
        return \Auth::Guard('api');
    }
}

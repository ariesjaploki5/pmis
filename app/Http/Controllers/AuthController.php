<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Model\Employee;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
 
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $select = DB::select("Select top 1 employeeid from hospital.dbo.user_acc where user_name = '$username' and user_pass = webapp.dbo.ufn_crypto('$password',1)");
        $user = $select[0];
        $employee = Employee::where('employeeid', $user->employeeid)->select('firstname', 'lastname', 'middlename', 'employeeid')->first();
        
        // $credentials = request($user[0]->user_name, $user[0]->user_pass);

        // if (! $token = auth('api')->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        return $this->respondWithToken($employee);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Model\Employee;
use App\Model\AccessLevel;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    

    public function error()
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function check_access_level($employee)
    {   
        if($employee->deptcode == 'nurse'){
            $al = 1;
        }
        return $this->select_access_level($al);
    }

    public function select_access_level($al)
    {
        $access_level = Access_level::where('id', $al)->first();
        return response()->json($access_level);
    }


    public function login(Request $request)
    {
        $credentials = request(['username', 'password']);

        $username = $request->username;
        $password = $request->password;

        $select = DB::select("Select top 1 employeeid from hospital.dbo.user_acc where user_name = '$username' and user_pass = webapp.dbo.ufn_crypto('$password',1)");
        
        $user_account = $select[0];
        $employee = Employee::where('employeeid', $user_account->employeeid)->select('firstname', 'lastname', 'middlename', 'employeeid')->first();

        if($employee === null){
            return $this->error();
        } else {
            $user = User::where('employee_id', $employee->employeeid)->first();

            if($user === null){
                // $al = $this->check_access_level($employee);
                $new = new User;
                $new->username = $username;
                $new->password = Hash::make($password);
                $new->employee_id = $employee->employeeid;
                // $new->access_level_id = $al;
                $new->save();
            } 
            if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        }
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

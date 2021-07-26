<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index(){
        return 'ok';
    }

    function validateUser(Request $request, $Unique){
        $this->validate($request,[
            'Username' => ['required', 'max:255', 'regex:/[_a-zA-Z0-9-]/', $Unique],
            'Password' => ['required', 'min:6']
        ]);
    }

    function register(Request $request){
        $Username = $request->Username;
        $this->validateUser($request, 'unique:User');
        $user = new User();
        if($user->createUser($request) == true){
            return $this->login($request);
        }
    }
    function login(Request $request){
        $credentials = request(['Username', 'Password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
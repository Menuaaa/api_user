<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try{

            $validateUser = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|confirmed',
            'phone'=> 'nullable'

        ]);
        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 300);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        event(new Registered($user));

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
        } catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }

    }

                /**
     * Login User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try{
            $validateUserName = Validator::make($request->all(),
        [
            'name' => 'required',
            'password' => 'required'

        ]);
        if($validateUserName->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUserName->errors()
            ], 401);
        }
        $user = User::where('name', $request->name)->first();
        if ($request->name == '' || $request->name != $user) {
            if(!Auth::attempt($request->only('name', 'password'))){
                return response()->json([
                    'status' => false,
                    'message' => 'name or password does not  match with your record',
                ], 401);
            }
        }

       

        return response()->json([
            'status' => true,
            'message' => 'User Login Successfully',
        ], 200);

        }   catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }

    }


}


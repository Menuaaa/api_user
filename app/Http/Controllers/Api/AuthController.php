<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'phone'=> 'required'

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
            $validateUserEmail = Validator::make($request->all(),
        [
            'email' => '',
            'password' => 'required'

        ]);
        if($validateUserEmail->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUserEmail->errors()
            ], 401);
        }

        $validateUserPhone = Validator::make($request->all(),
        [
            'phone' => '',
            'password' => 'required'
 
        ]);
        if($validateUserPhone->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUserPhone->errors()
            ], 465);
        }
 
        if ($request->email == '') {
            if(!Auth::attempt($request->only('phone', 'password'))){
                return response()->json([
                    'status' => false,
                    'message' => 'phone or password does not  match with your record',
                ], 401);
            }
        }
        if($request->phone == ''){
            if(!Auth::attempt($request->only('email', 'password'))){
                return response()->json([
                    'status' => false,
                    'message' => 'email or password does not  match with your record',
                ], 401);
            }

        }

        $user = User::where('email', $request->email)->first();

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


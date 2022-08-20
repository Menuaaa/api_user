<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessTokens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "message"=> 'user not found'
            ], 404);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        return redirect()->route('users.index')->with('success', 'user updated');
    }
    public function edit($id)
    {
        $users = User::find($id);
        $user =  DB::select('select * from users where id = ?', [$id]);
        return view('admin.users.edit_users', compact('user'));
    }
    public function add()
    {
        return view('admin.users.add_user');
    }
    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        return redirect()->route('users.index')->with('success', 'user created');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user created');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
        // foreach($users as $user){
        // dump($user->name);
        // }
    }
    public function update()
    {

    }
    public function edit($id)
    {
        $users = User::find($id);
        $user =  DB::select('select * from users where id = ?', [$id]);
        return view('admin.users.edit_users', compact('user'));
    }
}

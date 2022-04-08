<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('Users.index')->with('users',$users);
    }
    public function makeadmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('Users.index'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function adminHome()
    {
        $users = User::all();
        return view('adminHome', compact('users'));
    }

    
    public function addUser()
    {
        return view('addUser');
    }

    public function storeUser(Request $request){
        $user = new User();
        $user->NRP = $request->NRP;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        
        return back()->with('status', 'Form Data Has Been inserted');
    }
    public function create()
    {
        return view('create-user');
    }
}

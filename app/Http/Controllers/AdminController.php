<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Routineadd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    
    public function adminHome()
    {
        $jumlahKaryawan = User::where('role', 'User')->count(); 
        $jumlahHead = User::where('role', 'Head')->count(); 

        $users = User::all();
        return view('adminHome', compact('users', 'jumlahKaryawan','jumlahHead'));

    }

    public function showAdminUsers(Request $request)
    {
    $key = $request->input('key');
    $users = User::where('name', 'LIKE', "%{$key}%")
             ->orWhere('email', 'LIKE', "%{$key}%")
             ->orWhere('NRP', 'LIKE', "%{$key}%")
             ->get();
    $jumlahKaryawan = User::where('role', 'User')->count(); 
    $jumlahHead = User::where('role', 'Head')->count(); 

    return view('adminHome', compact('users', 'jumlahKaryawan','jumlahHead'));
    }

public function resetAdminUsers()
    {
    $users = User::all();
    $jumlahKaryawan = User::where('role', 'User')->count(); 
    $jumlahHead = User::where('role', 'Head')->count(); 

    return view('adminHome', compact('users', 'jumlahKaryawan', 'jumlahHead'));
    }

    
    public function addUser()
    {
        return view('addUser');
    }

    public function storeUser(Request $request)
    {
        $user = new User();
        $user->NRP = $request->NRP;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        
        return redirect('admin')->with('status', 'Data Berhasil Ditambahkan');
    }
    
    public function create()
    {
        return view('create-user');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
    
        return redirect('admin')->with('status', 'Data Berhasil telah dihapus');
    }


    public function editUser($id)
    {
    $user = User::findOrFail($id);
    return view('editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)       
    {
    $user = User::findOrFail($id);
    // Lakukan validasi data yang diubah
    $validatedData = $request->validate([
        'NRP' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
    ]);
    // Lakukan pembaruan data
    $user->update($validatedData);
    return redirect('admin')->with('status', 'Data User telah diperbarui');
    }



    public function routineaddHome()
    {
        $jumlahRoutine = Routineadd::all()->count(); 

        $routineadd = Routineadd::all();
        return view('routineadd/masterRoutine', compact('routineadd', 'jumlahRoutine'));

    }

    public function showRoutineadd(Request $request)
    {
    $key = $request->input('key');
    $users = User::where('name', 'LIKE', "%{$key}%")
             ->orWhere('id-routine', 'LIKE', "%{$key}%")
             ->get();
             
    $jumlahRoutine = Routineadd::all()->count(); 

    $routineadd = Routineadd::all();
    return view('routineadd/masterRoutine', compact('routineadd', 'jumlahRoutine'));
    }

public function resetRoutineadd()
    {
    $jumlahRoutine = Routineadd::all()->count(); 

    $routineadd = Routineadd::all();
    return view('routineadd/masterRoutine', compact('routineadd', 'jumlahRoutine'));
    }

    
    public function addRoutine()
    {
        return view('routineadd/addRoutine');
    }

    public function storeRoutineadd (Request $request)
    {
        $routineadd = new Routineadd();
        $routineadd->name = $request->name;
        $routineadd->save();
        
        return redirect('routineadd')->with('status', 'Data Berhasil Ditambahkan');
    }
    
    public function createRoutineadd()
    {
        return view('create-routineadd');
    }

    public function deleteRoutineadd($id)
    {
        Routineadd::findOrFail($id)->delete();
    
        return redirect('routineadd')->with('status', 'Data Berhasil telah dihapus');
    }


    public function editRoutineadd($id)
    {
    $routineadd = Routineadd::findOrFail($id);
    return view('routineadd/editRoutine', compact('routineadd'));
    }

    public function updateRoutineadd(Request $request, $id)       
    {
    $routineadd = Routineadd::findOrFail($id);
    // Lakukan validasi data yang diubah
    $validatedData = $request->validate([
        'name' => 'required',
    ]);
    // Lakukan pembaruan data
    $routineadd->update($validatedData);
    return redirect('routineadd')->with('status', 'Data telah diperbarui');
    }
    
}

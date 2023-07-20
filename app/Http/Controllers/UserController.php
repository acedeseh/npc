<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userHome(){
        
        return view('userHome');
    }

    public function showRoutine(Request $request)
    {
    $routine = Routine::all();
    $logged_in_nrp = auth()->user()->NRP;
    $JumlahKegiatanRoutine = Routine::where('NRP', 'LIKE', "%{$logged_in_nrp}%")->count();

    return view('routine/routine', compact('routine','logged_in_nrp','JumlahKegiatanRoutine'));
    }

   public function storeRoutine(Request $request)
    {
    $routine = new Routine ();
    $routine->NRP = auth()->user()->NRP;
    $routine->name = $request->name;
    $routine->period = $request->period;
    $routine->processtime = $request->processtime;
    $routine->frequency = $request->frequency;
    $routine->quantity_plan = $request->quantity_plan;
    $routine->quantity_actual = $request->quantity_actual;
    $routine->type = $request->type;
    $routine->save();

    return redirect('user/routine')->with('status', 'Data Berhasil Ditambahkan');
    }


    public function editRoutine($name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $routine = Routine::where('name', $name)->where('NRP', $logged_in_nrp)->first();

        if (!$routine) {
            // Kegiatan tidak ditemukan, lakukan penanganan kesalahan sesuai kebutuhan
            // Contoh: return redirect()->route('show.routine')->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('routine.editRoutine', compact('routine'));
    }

    public function updateRoutine(Request $request, $name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $routine = Routine::where('name', $name)->where('NRP', $logged_in_nrp)->first();


        // Proses pembaruan data kegiatan berdasarkan input form
        $routine->name = $request->name;
        $routine->period = $request->period;
        $routine->processtime = $request->processtime;
        $routine->frequency = $request->frequency;
        $routine->quantity_plan = $request->quantity_plan;
        $routine->quantity_actual = $request->quantity_actual;
        $routine->type = $request->type;
        $routine->save();

        return redirect()->route('show.routine')->with('status', 'Data berhasil diperbarui');
    }

    public function deleteRoutine($id)
{
    $logged_in_nrp = auth()->user()->NRP;
    $routine = Routine::where('id', $id)->where('NRP', $logged_in_nrp)->first();


    $routine->delete();

    return redirect()->route('show.routine')->with('status', 'Data berhasil dihapus');
}


    


    public function routine()
    {
        return view('routine/routine');
    }

    public function addRoutine()
    {
    return view('routine/addRoutine');
    }
    

    public function project()
    {
        return view('user.project');
    }

    


    public function incidental()
    {
        return view('user.incidental');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Routine;
use App\Models\Project;
use App\Models\Incidental;
use App\Models\Routineadd;
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

    public function addRoutineadd()
{
    $routineNames = Addroutines::pluck('name', 'id');
    return view('routine/addRoutine', compact('routineNames'));
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

    public function showProject(Request $request)
    {
    $project = Project::all();

    $logged_in_nrp = auth()->user()->NRP;
    $JumlahKegiatanProject = Project::where('NRP', 'LIKE', "%{$logged_in_nrp}%")->count();

    return view('project/project', compact('project','logged_in_nrp','JumlahKegiatanProject'));
    }

   public function storeProject(Request $request)
    {
    $project = new Project ();
    $project->NRP = auth()->user()->NRP;
    $project->name = $request->name;
    $project->period = $request->period;
    $project->processtime = $request->processtime;
    $project->save();

    return redirect('user/project')->with('status', 'Data Berhasil Ditambahkan');
    }


    public function editProject($name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $project = Project::where('name', $name)->where('NRP', $logged_in_nrp)->first();

        if (!$project) {
            // Kegiatan tidak ditemukan, lakukan penanganan kesalahan sesuai kebutuhan
            // Contoh: return redirect()->route('show.project')->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('project.editProject', compact('project'));
    }

    public function updateProject(Request $request, $name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $project = Project::where('name', $name)->where('NRP', $logged_in_nrp)->first();


        // Proses pembaruan data kegiatan berdasarkan input form
        $project->name = $request->name;
        $project->period = $request->period;
        $project->processtime = $request->processtime;
        $project->save();

        return redirect()->route('show.project')->with('status', 'Data berhasil diperbarui');
    }

    public function deleteProject($id)
    {
    $logged_in_nrp = auth()->user()->NRP;
    $project = Project::where('id', $id)->where('NRP', $logged_in_nrp)->first();
    $project->delete();

    return redirect()->route('show.project')->with('status', 'Data berhasil dihapus');
    }


    public function addProject()
    {
    return view('project/addProject');
    }


    public function incidental()
    {
        return view('user.incidental');
    }

    public function showIncidental(Request $request)
    {
    $incidental = Incidental::all();

    $logged_in_nrp = auth()->user()->NRP;
    $JumlahKegiatanIncidental = Incidental::where('NRP', 'LIKE', "%{$logged_in_nrp}%")->count();

    return view('incidental/incidental', compact('incidental','logged_in_nrp','JumlahKegiatanIncidental'));
    }

   public function storeIncidental(Request $request)
    {
    $incidental = new Incidental ();
    $incidental->NRP = auth()->user()->NRP;
    $incidental->name = $request->name;
    $incidental->period = $request->period;
    $incidental->processtime = $request->processtime;
    $incidental->save();

    return redirect('user/incidental')->with('status', 'Data Berhasil Ditambahkan');
    }


    public function editIncidental($name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $incidental = Incidental::where('name', $name)->where('NRP', $logged_in_nrp)->first();

        if (!$incidental) {
            // Kegiatan tidak ditemukan, lakukan penanganan kesalahan sesuai kebutuhan
            // Contoh: return redirect()->route('show.incidental')->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('incidental.editIncidental', compact('incidental'));
    }

    public function updateIncidental(Request $request, $name)
    {
        $logged_in_nrp = auth()->user()->NRP;
        $incidental = Incidental::where('name', $name)->where('NRP', $logged_in_nrp)->first();


        // Proses pembaruan data kegiatan berdasarkan input form
        $incidental->name = $request->name;
        $incidental->period = $request->period;
        $incidental->processtime = $request->processtime;
        $incidental->save();

        return redirect()->route('show.incidental')->with('status', 'Data berhasil diperbarui');
    }

    public function deleteIncidental($id)
    {
    $logged_in_nrp = auth()->user()->NRP;
    $incidental = Incidental::where('id', $id)->where('NRP', $logged_in_nrp)->first();
    $incidental->delete();

    return redirect()->route('show.incidental')->with('status', 'Data berhasil dihapus');
    }


    public function addIncidental()
    {
    return view('incidental/addIncidental');
    }



}

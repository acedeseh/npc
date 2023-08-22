<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Routine;
use App\Models\Project;
use App\Models\Incidental;
use Illuminate\Support\Facades\Session;

class HeadController extends Controller
{
    public function headHome()
    {
        $data = $this->totalPresentase();
        $karyawanData = $data['karyawanData'];
        $karyawanPersentase = $data['karyawanPersentase'];

        // Kirim data karyawan dan total persentase ke halaman headHome
        return view('headHome', compact('karyawanData', 'karyawanPersentase'));
    }


    public function totalPresentase()
    {
    // Ambil data karyawan dari tabel 'users'
    $karyawanData = User::where('role', '!=', 'Head')->where('role', '!=', 'Admin')->get();
    

    // Array untuk menyimpan total persentase dari masing-masing karyawan
    $karyawanPersentase = [];

    // Lakukan perhitungan total persentase untuk setiap karyawan
    foreach ($karyawanData as $karyawan) {
        // Ambil data dari tabel 'Routine', 'Project', dan 'Incidental' berdasarkan NRP
        $routineQuantityPlan = Routine::where('NRP', $karyawan->NRP)->sum('quantity_plan');
        $routineQuantityActual = Routine::where('NRP', $karyawan->NRP)->sum('quantity_actual');
        $projectProcesstime = Project::where('NRP', $karyawan->NRP)->sum('processtime');
        $projectPeriod = Project::where('NRP', $karyawan->NRP)->value('period');
        $incidentalProcesstime = Incidental::where('NRP', $karyawan->NRP)->sum('processtime');
        $incidentalPeriod = Incidental::where('NRP', $karyawan->NRP)->value('period');

        // Hitung total persentase untuk $routine
        $totalProductivityRoutine = $routineQuantityPlan > 0 ? $routineQuantityActual / $routineQuantityPlan * 100 : 0;

        // Hitung total persentase untuk $project
        $projectMultiplier = 1;
        if ($projectPeriod === 'Weekly') {
            $projectMultiplier = 48;
        } elseif ($projectPeriod === 'Monthly') {
            $projectMultiplier = 12;
        } elseif ($projectPeriod === 'Yearly') {
            $projectMultiplier = 1;
        } elseif ($projectPeriod === 'Daily') {
            $projectMultiplier = 233;
        }

        $totalProductivityProject = ($projectProcesstime * $projectMultiplier*10) / 838;

        // Hitung total persentase untuk $incidental
        $incidentalMultiplier = 1;
        if ($incidentalPeriod === 'Weekly') {
            $incidentalMultiplier = 48;
        } elseif ($incidentalPeriod === 'Monthly') {
            $incidentalMultiplier = 12;
        } elseif ($incidentalPeriod === 'Yearly') {
            $incidentalMultiplier = 1;
        } elseif ($incidentalPeriod === 'Daily') {
            $incidentalMultiplier = 233;
        }

        $totalProductivityIncidental = ($incidentalProcesstime * $incidentalMultiplier * 10) / 503;

        // Hitung total persentase
        $totalProductivity = $totalProductivityRoutine + $totalProductivityProject + $totalProductivityIncidental;

        // Tambahkan total persentase ke array dengan NRP sebagai kunci
        $karyawanPersentase[$karyawan->NRP] = number_format($totalProductivity, 2) . '%';
    }

    // Kirim data karyawan dan total persentase ke halaman Head
    return view('userHome', compact('karyawanData', 'karyawanPersentase'));
    }

public function showKegiatanByNRP($NRP)
    {
        // Ambil data karyawan berdasarkan NRP
        $karyawan = User::where('NRP', $NRP)->first();

        // Ambil data kegiatan berdasarkan NRP karyawan dari tabel Routine, Project, dan Incidental
        $routineKegiatan = Routine::where('NRP', $NRP)->get();
        $projectKegiatan = Project::where('NRP', $NRP)->get();
        $incidentalKegiatan = Incidental::where('NRP', $NRP)->get();

        return view('kegiatanDetail', compact('karyawan', 'routineKegiatan', 'projectKegiatan', 'incidentalKegiatan'));
    }
}


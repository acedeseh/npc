<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function headHome()
    {
        return view('headHome');
    }
}

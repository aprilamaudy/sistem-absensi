<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(){
        $dataKehadiran = Kehadiran::all();
        return view('admin.laporan', compact('dataKehadiran'));
    }
}

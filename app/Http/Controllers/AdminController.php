<?php

namespace App\Http\Controllers;

use\App\Pasien;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $pasiens = Pasien::all();
        return view('tampil.index', compact('pasiens'));
    }
}

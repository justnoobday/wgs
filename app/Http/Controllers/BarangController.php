<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function index()
    {

        $sales = DB::table('sales')->get();
        $courier = DB::table('courier')->get();

        // mengirim data pegawai ke view index
        return view('index', ['sales' => $sales, 'courier' => $courier]);
    }
}

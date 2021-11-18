<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }
}

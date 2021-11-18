<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.home', compact('user'));
    }
}

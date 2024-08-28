<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //This method will show admin dashboard page.
    public function index(){
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //This method will show dashboard page for customer or users.
    public function index(){
        return view('dashboard');
    }
}

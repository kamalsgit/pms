<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Repositories\ProjectRespository;

class DashboardController extends Controller
{
    public function dashboard(){
		$dashboard = "Welcome To Dashboard.....";
		return view('dk.dashboard.dashboard',compact('dashboard'));
	}
}

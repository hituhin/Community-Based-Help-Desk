<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
 	public function __construct()
 	{
 	    $this->middleware(['checkdata','verified','auth',]);
 	}   

    public function profile(){

    	
    	return view('user.profile');
    }
}

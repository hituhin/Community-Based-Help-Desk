<?php

namespace App\Http\Controllers\forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Skill;

class ForumController extends Controller
{
    
	public function __construct()
    {
        $this->middleware(['verified','auth']);
    }
    
    public function discuss(){

    	return view('forum.forum')->with('skills', Skill::all());
    }
}

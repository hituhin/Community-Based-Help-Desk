<?php

namespace App\Http\Controllers;

use App\Connect;
use App\Feedback;
use App\Meeting;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['checkdata','verified','auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $completed_meeting = Meeting::where([['seeker_id',auth()->id()],['status',22]])
                                    ->orWhere([['provider_id',auth()->id()],['status',22]])
                                    ->get();

        $total_connects = Connect::where([['request_by',auth()->id()],['status',1]])
                                    ->orWhere([['request_to',auth()->id()],['status',1]])
                                    ->get();
        
        
        $meeting_request = Meeting::where(['provider_id'=> auth()->id()])
                    ->where(['status'=> 0])
                    ->get();

        $waiting_feedback = Meeting::where([['seeker_id',auth()->id()],['status',2]])
                                    ->orWhere([['provider_id',auth()->id()],['status',2]])
                                    ->get();

        $connect_request = Connect::where(['status'=>0])
                            ->where(['request_to'=> auth()->id()])
                            ->get();

        $next_meeting= Meeting::where([['seeker_id',auth()->id()],['status',1],['start_time','>=',now()]])
                      ->orWhere([['provider_id',auth()->id()],['status',1],['start_time','>=',now()]])
                      ->take(5)->get();

        $just_next= Meeting::where([['seeker_id',auth()->id()],['status',1],['start_time','>=',now()]])
                      ->orWhere([['provider_id',auth()->id()],['status',1],['start_time','>=',now()]])
                      ->first(); 


        $prev_meeting= Meeting::where([['seeker_id',auth()->id()],['status',1],['start_time','<=',now()]])
                      ->orWhere([['provider_id',auth()->id()],['status',1],['start_time','<=',now()]])
                      // ->orderBy('start_time', 'desc')->take(5)->get(); 
                      ->take(5)->get(); 

        // $next_mee

        return view('home')->with('completed_meeting', $completed_meeting->count())
                        ->with('total_connects', $total_connects->count())
                        ->with('rating', Auth::user()->rating())
                        ->with('meeting_request', $meeting_request->count())
                        ->with('total_discussion', Auth::user()->discussions()->count())
                        ->with('meeting_request', $meeting_request->count())
                        ->with('waiting_feedback', $waiting_feedback->count())
                        ->with('connect_request', $connect_request->count())
                        ->with('next_meeting', $next_meeting)
                        ->with('prev_meeting', $prev_meeting)
                        ->with('just_next', $just_next);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Calendar;
use App\Meeting;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }

    public function index()
    {
        $getevents = Meeting::all();
        $getevents= Meeting::where(['seeker_id'=> auth()->id()])
                    ->orWhere(['provider_id'=> auth()->id()])
                    ->orWhere(['status'=> 153])
                    ->get();
        return view('user.meeting.user-allevents',compact('getevents'));
    }


    public function singleMeeting($id)
    {
        $getevent = Meeting::findOrFail($id);
        
        return response()->json($getevent);
    }


    public function getSeekerMeeting()
    {
        $getevents = Meeting::all();

        $getevents= Meeting::where([['seeker_id',auth()->id()],['status',0]])
                    ->orWhere([['seeker_id',auth()->id()],['status',1]])
                    ->orWhere([['seeker_id',auth()->id()],['status',3]])

                    ->get();

        return view('user.meeting.seeker-allevents',compact('getevents'));
    }

    public function getSeekerColAjx()
    {
        $getevents= Meeting::where([['seeker_id',auth()->id()],['status',0]])
                    ->orWhere([['seeker_id',auth()->id()],['status',1]])
                    ->orWhere([['seeker_id',auth()->id()],['status',3]])
                    ->with('provider')
                    ->get();
        return response()->json($getevents);
    }

    public function getProviderMeeting()
    {

        return view('user.meeting.provider-allevents');
    }

    public function getProviderColAjx()
    {
        $getevents= Meeting::where([['provider_id',auth()->id()],['status',0]])
                    ->orWhere([['provider_id',auth()->id()],['status',1]])
                    ->orWhere([['provider_id',auth()->id()],['status',3]])
                    ->with('seeker')
                    ->get();

        return response()->json($getevents);
    }

    public function getCollaborationRequest()
    {
        $getevents = Meeting::all();
        $getevents= Meeting::where(['provider_id'=> auth()->id()])
                    ->where(['status'=> 0])
                    ->get();
        return view('user.providehelp.newrequest')->with(['getevents'=>$getevents]);
    }


    public function getUserCollaRequest()
    {
        $getevents = Meeting::all();
        $getevents= Meeting::where(['seeker_id'=> auth()->id()])
                    ->where(['status'=> 0])
                    ->get();
        return view('user.meeting.user-request')->with(['getevents'=>$getevents]);
    }


    public function acceptMeeting(Request $request,$id)
    {

        $rules = array (
            'provider_msg' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            session()->flash('error', 'Plese try again');
            return response()->json('error');
        }else {

            $getevent = Meeting::findOrFail($id);
            $getevent->update([

                'status' =>1,
                'provider_msg' =>$request->provider_msg
            ]);
            return response()->json('success');
        }
    }

    public function rejectMeeting($id)
    {
        $getevent = Meeting::findOrFail($id);
        $getevent->update([

            'status' =>3
        ]);
        return response()->json('success');
    }


    public function cancelMeeting($id)
    {
        $getevent = Meeting::findOrFail($id);
        
        $getevent->delete();
        return response()->json('success');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('user.meeting.addevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // dd($request->all());
        
        $this->validate($request, [

            'location' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'description' => 'required'
        ]);

        $start = $request->date ." " . $request->starttime;

        $end = $request->date . $request->endtime;

        $seekerId = Auth::id();

        $meeting = new Meeting();
        $meeting->place = $request->location;
        $meeting->seeker_id = $seekerId;
        $meeting->provider_id = $request->provider_id;
        $meeting->start_time = Carbon::parse($start);
        $meeting->end_time = Carbon::parse($end);
        $meeting->description = $request->description;
        $meeting->save();

        session()->flash('success', 'New meeting request has been sent.');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [

            'place' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'description' => 'required'
        ]);

        if ($validator->passes())
        {   
            $start = $request->date ." " . $request->starttime;

            $end = $request->date . $request->endtime;
            $getevent = Meeting::findOrFail($id);

            $getevent->update([

                'place' =>$request->place,
                'start_time' =>Carbon::parse($start),
                'end_time' =>Carbon::parse($end),
                'description' =>$request->description,
            ]);
            return Response::json(true);
        }else{
            return Response::json(false);

        }

        
        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

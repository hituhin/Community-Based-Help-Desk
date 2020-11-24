<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Feedback;
use App\Meeting;
use App\Skill;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth:admin');// only allow admin guard
    }


    public function profile($user_id){

        // $user_id = Auth::Id();
        // 
        $feedbacks= Feedback::where('receiver_id', '=', $user_id)
                            ->orderBy('id', 'desc')
                            ->take(5)
                            ->get();

        $user = User::findOrFail($user_id);

        $getevents= Meeting::where(['seeker_id'=> $user_id])
                    ->orWhere(['provider_id'=> $user_id])
                    ->orWhere(['status'=> 153])
                    ->get();


        return view('admin.profile')->with(['user'=>$user])
                                    ->with(['feedbacks'=>$feedbacks])
                                    ->with(['getevents'=>$getevents]);


    }

// Skills

    public function skills()
    {   
        $skills= Skill::all();
        return view('admin.skills')->with(['skills'=>$skills]);
    }

    public function addSkill(Request $request)
    {   

        $this->validate(request(), [
            'name' => 'required'
          ]);

        $skill = new Skill();
        $skill->create([

            'name' => $request->name
        ]);

        session()->flash('success', 'New skill has been added.');
        return redirect()->back();
    }    

    public function editSkill(Request $request,$id)
    {   

        $this->validate(request(), [
            'name' => 'required'
          ]);

        $skill = Skill::findOrFail($id);
        $skill->update([

            'name' => $request->name
        ]);

        session()->flash('success', 'This skill has been updated.');
        return redirect()->back();
    }

    public function deleteSkill(Request $request,$id)
    {   

        $skill = Skill::findOrFail($id);
        $skill->delete();

        session()->flash('success', 'This skill has been deleted.');
        return redirect()->back();
    }

// ===> channel

    public function channels()
    {   
        $channels= Channel::all();
        return view('admin.channels')->with(['channels'=>$channels]);
    }

    public function addChannel(Request $request)
    {   
        // dd($request->all());
        $this->validate(request(), [
            'title' => 'required'
          ]);

        $channel = new Channel();

        $channel->create([
            'title' => $request->title,
            'slug' => str_slug($request->title)
        ]);

        session()->flash('success', 'New channel has been added.');
        return redirect()->back();
    }    

    public function editChannel(Request $request,$id)
    {   

        $this->validate(request(), [
            'title' => 'required'
          ]);

        $channel = Channel::findOrFail($id);
        $channel->update([

            'title' => $request->title,
            'slug' => str_slug($request->title)
        ]);

        session()->flash('success', 'This channel has been updated.');
        return redirect()->back();
    }

    public function deleteChannel(Request $request,$id)
    {   

        $channel = Channel::findOrFail($id);
        $channel->delete();

        session()->flash('success', 'This channel has been deleted.');
        return redirect()->back();
    }



// ==> meeting
// 
    public function meeting(){
        $getevents = Meeting::all();

        return view('admin.allmeetings',compact('getevents'));
    }

    public function newEvent(){
        return view('admin.addevent');
    }

    public function storeEvent(Request $request)
    {   
        $this->validate($request, [

            'title' => 'required',
            'location' => 'required',
            'date' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'description' => 'required'
        ]);

        $start = $request->date ." " . $request->starttime;

        $end = $request->date . $request->endtime;

        $providerId = Auth::id();

        $meeting = new Meeting();
        $meeting->place = $request->location;
        $meeting->seeker_id = 0;
        $meeting->provider_id = 0;
        $meeting->start_time = Carbon::parse($start);
        $meeting->end_time = Carbon::parse($end);
        $meeting->description = $request->description;
        $meeting->provider_msg = $request->title;
        $meeting->status = 153;
        $meeting->save();

        session()->flash('success', 'New collaboration request has been sent.');

        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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

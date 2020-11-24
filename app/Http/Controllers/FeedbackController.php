<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Auth;

class FeedbackController extends Controller
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
        $getevents= Meeting::where([['seeker_id',auth()->id()],['status',22]])
                    ->orWhere([['provider_id',auth()->id()],['status',22]])
                    ->get();
        return view('user.feedback.feedback',compact('getevents'));
    }

    public function review()
    {
        $getevents= Meeting::where([['seeker_id',auth()->id()],['status',2]])
                    ->orWhere([['provider_id',auth()->id()],['status',2]])
                    ->get();
        return view('user.feedback.give-feedback',compact('getevents'));
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
        $validator = Validator::make($request->all(), [
            'review'     => 'required'
        ]);

        $id = Auth::id();
        $colId = $request->colId;

        if ($validator->passes())
        {   

            $collaboration = Meeting::find($colId);

            
            // if (isset($collaboration->feedback)) {
            //     if($collaboration->feedback = 1){

            //     }
            // }
            $collaboration->update([

                'status' =>22
            ]);

            $feedback = new Feedback([
                'review' => $request->review,
                'rating' => $request->rating,
                'receiver_id' => $request->receiver_id,
                'user_id' => $id ]);

            $collaboration->feedback()->save($feedback);

            


            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);





        return response()->json($request->all()); 
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

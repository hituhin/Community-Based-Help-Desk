<?php

namespace App\Http\Controllers\User;

use App\Connect;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\UserNotification;

class ConnectController extends Controller
{   

    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }

    public function connectRequest($user_id)
    {
        Connect::create([
          'request_by' => Auth::id(),
          'request_to' => $user_id
        ]);

        $details = [

            'text' => 'You have a new connect request.' ,
            'url' => url('new-connect-reqeust'),
        ];

        $user = User::findOrFail($user_id);

        $user->notify(new UserNotification($details));
        // Notification::send($users, new UserNotification($details));

        session()->flash('success', 'Your request has been sent');
        return redirect()->back();
    }

    public function acceptRequest($user_id)
    {
        $connect = Connect::where(['request_by' => $user_id])
                        ->where(['request_to'=> Auth::id()])->first();
        $connect->update([
          'status' => 1,
        ]);
        session()->flash('success', 'This request has been accepted');
        return redirect()->back();
    }

    public function rejectRequest($user_id)
    {    

        $connect = Connect::where(['request_by' => $user_id])
                        ->where(['request_to'=> Auth::id()])->first();
        $connect->delete();
        session()->flash('success', 'This request has been rejected');

        return redirect()->back();
    }

    public function cancelRequest($user_id)
    {    
        $connect = Connect::where(['request_to' => $user_id])
                        ->where(['request_by'=> Auth::id()])->first();
        $connect->delete();
        session()->flash('success', 'This request has been cancelled');

        return redirect()->back();
    }

    public function acceptConnectR($req_id)
    {   

        $connect = Connect::findOrFail($req_id);

        $connect->update([
          'status' => 1,
        ]);

        return response()->json('success');
    }


    public function rejectConnectR($req_id)
    {    
        $connect = Connect::findOrFail($req_id);
        
        $connect->delete();

        return response()->json('success');
    }


    public function cancelConnectR($req_id)
    {    
        $connect = Connect::findOrFail($req_id);

        $connect->delete();

        return response()->json('success');
    }

    public function removeConnect($req_id)
    {    
        $connect = Connect::findOrFail($req_id);
        $connect->delete();
        return response()->json('success');
    }

    

    public function getAllConnects()
    {
        $connects = Connect::where(['request_by'=> auth()->id()])
        ->where(['status' => 1])
        ->orWhere(['request_to' => auth()->id()])
        ->where(['status' => 1])
        ->get();

        return view('user.connect.connectlist')->with('connects', $connects);


    }


    public function newConnectReqList()
    {
        $connects = Connect::where(['status'=>0])
                    ->where(['request_to'=> auth()->id()])
                    ->get();


        return view('user.connect.new-request')->with('connects', $connects);
    }


    public function userConnectReqList()
    {
        $connects = Connect::where(['status'=>0])
                    ->where(['request_by'=> auth()->id()])
                    ->get();

        return view('user.connect.user-new-request')->with('connects', $connects);
    }


    public function blockConnect($req_id)
    {
        $connect = Connect::findOrFail($req_id);

        $connect->update([
          'status' => 2,
          'updated_at' => now(),
          'blocked_by' => Auth::id()
        ]);

        return response()->json('success');
    }


    public function unBlockConnect($req_id)
    {
        $connect = Connect::findOrFail($req_id);

        $connect->update([
          'status' => 1,
          'blocked_by' => 0
        ]);

        return response()->json('success');
    }

    public function userBlockedList()
    {
        $connects = Connect::where(['request_by'=> auth()->id()])
                    ->where(['blocked_by'=>auth()->id()])
                    ->orWhere(['request_to' => auth()->id()])
                    ->where(['blocked_by'=>auth()->id()])
                    ->get();
        return view('user.connect.blocklist')->with('connects', $connects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

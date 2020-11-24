<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
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
    
    public function index()
    {
        $users= User::where(['status'=> 1])
                    ->get();
        return view('admin.users')->with(['users'=>$users]);
    }

    public function deactiveIndex()
    {
        $users= User::where(['status'=> 0])
                    ->get();
        return view('admin.users-deactive')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' =>1
        ]);

        session()->flash('success', 'This user has been activated.');
        return redirect()->back();
    }
    public function deactive($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' =>0
        ]);

        session()->flash('success', 'This user has been deactivated.');
        return redirect()->back();
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

<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Channel;
use App\Discussion;
use App\Skill;
use App\User;
use App\Meeting;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');// only allow admin guard
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $completed_meeting = Meeting::where('status',22)
                            ->get();
        $progressing_meeting = Meeting::where('status',1)
                            ->get();

        $discussions = Discussion::all();
        $users = User::all();
        $skills = Skill::all();
        $channels = Channel::all();





        return view('admin.home')->with('completed_meeting', $completed_meeting->count())

                                    ->with('progressing_meeting', $progressing_meeting->count())
                                    ->with('discussions', $discussions->count())
                                    ->with('skills', $skills->count())
                                    ->with('channels', $channels->count())
                                    ->with('users', $users->count());
    }

    public function create(){
        return view('admin.newadmin');
    }

    public function store(Request $request){

        if($request->role == 0){
            $request['role'] = null;
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'image|required',
            'role' => 'required'
          ]);




        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $file->move('img/profile', $name);

        $user = new Admin();
        $user->create([
          'name' => $request->name,
          'email' => $request->email,
          'role' => $request->role,
          'password' => bcrypt($request->password),
          'photo' => $name
        ]);


        session()->flash('success', 'New admin has been added.');

        return redirect()->back();
    }



    public function editProfile(){
        $user = Auth::guard('admin')->user();
        return view('admin.editProfile')->with(['user'=>$user]);
    }
    public function updateProfile(Request $request,$id){


        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image'
          ]);



        if($request->file('image')){

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('img/profile', $name);

            $user = Admin::findOrFail($id);
            $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'photo' => $name
            ]);
        }else{
            $user = Admin::findOrFail($id);
            $user->update([
              'name' => $request->name,
              'email' => $request->email
            ]);
        }
        


        session()->flash('success', 'Profile has been updated.');

        return redirect()->back();
    }



    public function allAdmin()
    {
        $users= Admin::where(['status'=> 1, 'role'=>2])
                    ->orWhere([ ['status',1], ['role',3]])
                    ->get();

        return view('admin.admins')->with(['users'=>$users]);
    }

    public function edit($id){
        $admin = Admin::findOrFail($id);
        return view('admin.edit-admin')->with(['admin'=>$admin]);
    }

    public function update(Request $request, $id){

        if($request->role == 0){
            $request['role'] = null;
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
          ]);

        $user = Admin::findOrFail($id);
        $user->Update([
          'name' => $request->name,
          'email' => $request->email,
          'role' => $request->role
        ]);


        session()->flash('success', 'Information has been updated.');

        return redirect()->route('alladmin');
    }
    public function deactiveIndex()
    {
        $users= Admin::where(['status'=> 0])
                    ->get();
        return view('admin.admins-deactive')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function active($id)
    {
        $user = Admin::findOrFail($id);
        $user->update([
            'status' =>1
        ]);

        session()->flash('success', 'This admin has been activated.');
        return redirect()->back();
    }
    public function deactive($id)
    {
        $user = Admin::findOrFail($id);

        $user->update([
            'status' =>0
        ]);

        session()->flash('success', 'This admin has been deactivated.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete();

        session()->flash('success', 'This admin has been deleted.');
        return redirect()->back();
    }


    public function changePass()
    {   

        return view('admin.change-password')->with('user',Auth::guard('admin')->user());
    }

    public function changePassword(Request $request)
    {  
        if (!(Hash::check($request->get('current-password'), Auth::guard('admin')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("errorP","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("errorP","New Password cannot be same as your current password. Please choose a different password.");
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);


        //Change Password
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("successP","Your password has been changed successfully !");

    }



}

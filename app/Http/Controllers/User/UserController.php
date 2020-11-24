<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Skill;
use App\User;
use App\Feedback;
use App\Meeting;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;


use Illuminate\Pagination\Paginator;

class UserController extends Controller
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
    
    public function search(){

        $search =  request()->query('q');


        if (request()->query('q')) {
            $users = User::where('name', 'LIKE', "%{$search}%")
                            ->orWhere('email', 'LIKE', "%{$search}%")->get();
                            
            $users = $users->filter(function($user) {
                return $user->id != Auth::id();
            });

            return view('user.search')->with('skills', $skills = Skill::take(8)->get())
                                ->with('users', $users);

        }elseif (request()->query('s')) {

            $skill_id =  request()->query('s');

            $skill = Skill::findOrFail($skill_id);

            $users = $skill->users;

            $users = $users->filter(function($user) {
                return $user->id != Auth::id();
            });

            return view('user.search')->with('skills', $skills = Skill::take(8)->get())
                                ->with('users', $users);
        }else {


            $users = User::where('id', '!=', Auth::id() )->get();
            return view('user.search')->with('skills', $skills = Skill::take(8)->get())
                                ->with('users', $users);

        }

    
        

    }


    public function userNotifcation()
    { 
        $user = Auth::user();

        // return $user;

        foreach ($user->unReadNotifications as $notification) {
          if ($notification->type == "App\Notifications\UserNotification") {
              $notification->markAsRead();
          }
        }

        return view('user.notifications');
    }

    public function userProfile(){

        $user_id = Auth::Id();

        $feedbacks= Feedback::where('receiver_id', '=', $user_id)
                            ->orderBy('id', 'desc')
                            ->take(5)
                            ->get();

        $user = User::findOrFail($user_id);

        $getevents= Meeting::where(['seeker_id'=> $user_id])
                    ->orWhere(['provider_id'=> $user_id])
                    ->orWhere(['status'=> 153])
                    ->get();


        return view('user.profile')->with(['user'=>$user])
                                    ->with(['feedbacks'=>$feedbacks])
                                    ->with(['getevents'=>$getevents]);


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


        return view('user.profile')->with(['user'=>$user])
                                    ->with(['feedbacks'=>$feedbacks])
                                    ->with(['getevents'=>$getevents]);


    }


    public function changePass()
    {   

        return view('user.profile.change-password')->with('user',Auth::user());
    }

    public function changePassword(Request $request)
    {  
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
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
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("successP","Your password has been changed successfully !");

    }

    public function editProfile()
    {   

        return view('user.profile.editprofile')->with('user',Auth::user())
                                                ->with('skills',Skill::all());
    }

    public function blockedStep()
    {   

        return view('user.blockredirect');
    }

    public function updateStep()
    {   

        return view('user.profile.updateconf')->with('user',Auth::user())
                                                ->with('skills',Skill::all());
    }


    public function updateConf(Request $request,$id)
    {   
        
        $rules = array (
            'name' => 'required',
            'description' => 'required',
            // 'email' => 'required',
            'gender' => 'required',
            'd_birth' => 'required',
            'skills' => 'required',
            'image' => 'image|required'
        );
        $attributeNames = array(
            'description' => 'about',
            'd_birth' => 'date of birth',
        );
        $validator = Validator::make ( Input::all (), $rules );
        $validator->setAttributeNames($attributeNames);



        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }





        $user = User::findOrFail($id);

         // dd($request->all());
        

        if($file = $request->file('image')){

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('img/profile', $name);

            $user->update([
              'name' => $request->name,
              'gender' => $request->gender,
              'd_birth' => $request->d_birth,
              // 'description' => $request->About or Bio,
              'description' => $request->description,
              'image' => $name
            ]);


        }else{
            $user->update([
              'name' => $request->name,
              'gender' => $request->gender,
              'd_birth' => $request->d_birth,
              'description' => $request->description
            ]);
        }

        if ($request->skills) {
          $user->skills()->sync($request->skills);
        }





        session()->flash('success', 'Profie updated successfully.');

        return redirect()->route('home');
    }

    public function updateProfile(Request $request,$id)
    {   

        $rules = array (
            'name' => 'required',
            'description' => 'required',
            // 'email' => 'required',
            'gender' => 'required',
            'd_birth' => 'required',
            'skills' => 'required',
            'image' => 'image'
        );
        $attributeNames = array(
            'description' => 'about',
            'd_birth' => 'date of birth',
        );
        $validator = Validator::make ( Input::all (), $rules );
        $validator->setAttributeNames($attributeNames);



        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }





        $user = User::findOrFail($id);

         // dd($request->all());
        

        if($file = $request->file('image')){

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('img/profile', $name);

            $user->update([
              'name' => $request->name,
              'gender' => $request->gender,
              'd_birth' => $request->d_birth,
              // 'description' => $request->About or Bio,
              'description' => $request->description,
              'image' => $name
            ]);


        }else{
            $user->update([
              'name' => $request->name,
              'gender' => $request->gender,
              'd_birth' => $request->d_birth,
              'description' => $request->description
            ]);
        }

        if ($request->skills) {
          $user->skills()->sync($request->skills);
        }





        session()->flash('success', 'Profie updated successfully.');

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

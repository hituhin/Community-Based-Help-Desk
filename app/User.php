<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;
use App\Meeting;
use App\Connect;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $directory = "/img/profile/";


    public function skills(){
        return $this->belongsToMany('App\Skill');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function discussions()
    {
        return $this->hasMany('App\Discussion');
    }

    public function feedback(){

        return $this->hasMany('App\Feedback','receiver_id');
    }

    public function hasTag($skillId)
    {
      return in_array($skillId, $this->skills->pluck('id')->toArray());
    }

    public function hasConnect($id,$fid)
    {   

        $canAccept = DB::table('connects')->Where(['request_by'=> $fid, 'request_to' =>$id])
                                    ->where('status', 0)
                                    ->count();

        $canCancel = DB::table('connects')->Where(['request_by'=> $id, 'request_to' =>$fid])
                                    ->where('status', 0)
                                    ->count();



        // $user0 = DB::table('connects')->where(['request_by'=> $id, 'request_to' =>$fid])
        //                             ->where('status', 0)
        //                             ->orWhere(['request_by'=> $fid, 'request_to' =>$id])
        //                             ->where('status', 0)
        //                             ->count();

        $user1 = DB::table('connects')->where(['request_by'=> $id, 'request_to' =>$fid, 'status'=> 1])
                                    ->count();

        $user2 = DB::table('connects')->where(['request_by'=> $fid, 'request_to' =>$id, 'status'=> 1])
                                            ->count();

        if( $canAccept > 0 ){
            return "accept";
        }

        if( $canCancel > 0 ){
            return "cancel";
        }

        
        if($user1 > 0 || $user2 > 0){
            return "connected";
        }else{
            return "can";
        }

        

    }

    public function getImageAttribute($value){
        return $this->directory.$value;
    }


    public function rating(){
            
            $feedback = $this->feedback();
            $feedback_count = $feedback->count();
            $rating_all = $feedback->pluck('rating');
            $rating_total = 0;

            foreach ($rating_all as $rating) {
               $rating_total += $rating;
            }

            if($feedback_count <= 0){
              $feedback_count = 1;
            }

            $rating = $rating_total/$feedback_count;

            if($rating == 0){
              return $rating = 0;
            }



            return round($rating);
    }


    public function total_completed($id){
        $completed = Meeting::where([['seeker_id',$id],['status',22]])
                    ->orWhere([['provider_id',$id],['status',22]])
                    ->get(); 
        return $completed->count();
    }

    public function total_connected($id){
        $connects = Connect::where([['request_by',auth()->id()],['status',1]])
                        ->orWhere([['request_to',auth()->id()],['status',1]])
                        ->get(); 
        return $connects->count();
    }




}

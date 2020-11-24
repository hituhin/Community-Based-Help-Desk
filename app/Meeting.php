<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Meeting extends Model
{
  protected $guarded = [];
  protected $dates =[
        'start_time','end_time'
    ];
  protected $appends = ['statusajax','color'];


	public function seeker()
	{
		return $this->belongsTo('App\User', 'seeker_id');
	}

	public function provider()
	{
		return $this->belongsTo('App\User', 'provider_id');
	}

    public function feedback(){
        return $this->hasMany('App\Feedback'); 
    }


	public function getstatusajaxAttribute(){

        if($this->status == 0 ){
        	return "Processing";
        }elseif ($this->status == 1) {
        	return "Progressing";
        }elseif ($this->status == 2) {
            return "Waiting for feedback";
        }elseif ($this->status == 153) {
            return "Official Event";
        }elseif ($this->status == 22) {
            return "Completed";
        }elseif ($this->status == 3) {
            return "Rejected";
        }elseif ($this->status == 4) {
            return "Failed";
        }else{
        	return "Something wrong";
        }    
    }

    public function getcolorAttribute(){

        if($this->status == 0 ){
        	return "#F9D384";
        }elseif ($this->status == 1) {
        	return "#80CBE7";
        }elseif ($this->status == 2) {
            return "#37BC9B";
        }elseif ($this->status == 22) {
            return "#37BC9A";
        }elseif ($this->status == 153) {
            return "#0084FF";
        }elseif ($this->status == 3) {
            return "#DA4453";
        }elseif ($this->status == 4) {
            return "#DA4453";
        }else{
        	return "#DA4453";
        }    
    }


    public function is_gave_feedback()
    {
        $id = Auth::id();

        $feedback_user = array();

        foreach($this->feedback as $f):
            array_push($feedback_user, $f->user_id);
        endforeach;

        if(in_array($id, $feedback_user))
        {
            return true;
        }
        else {
            return false;
        }
    }



}

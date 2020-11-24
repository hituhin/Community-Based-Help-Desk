<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    

    protected $guarded=[];

    protected $appends = ['msgtime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getMsgtimeAttribute(){

        // $timeh = $this->created_at->isoFormat('dddd, MMMM Do YYYY, h:mm');
        $timeh = $this->created_at->toDayDateTimeString();
        // $timeh = $this->attributes['created_at'];
        return $timeh;
    }



}

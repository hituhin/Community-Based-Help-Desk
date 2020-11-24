<?php

namespace App\Http\Controllers\forum;
use App\Http\Controllers\Controller;

use App\Channel;
use App\Discussion;
use App\Reply;
use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Auth;

class ForumsController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }
    
    public function index()
    {   
        $search =  request()->query('s');
        
        if (request()->query('s')) {

            $discussions = Discussion::where('title', 'LIKE', "%{$search}%")
                            ->orWhere('content', 'LIKE', "%{$search}%")->paginate(3);
            return view('forum.forum', ['discussions' => $discussions]);

        }elseif(request()->query('ss')){

            if(request()->query('ss') ==1){

                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==2){
                $user=Auth::id();
                $discussions = Discussion::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==3){

                $discussionsId = array();
                $watchers = Watcher::all();
                 foreach ($watchers as $w) {
                        array_push($discussionsId, $w->discussion_id);
                 }

                $discussions = Discussion::whereIn('id',$discussionsId)->orderBy('created_at', 'desc')->paginate(3);
                // orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==4){

                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==5){

                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==6){
                // $best_answer = $discussion->replies()->where('best_answer', 1)->first();
                

                $solved = array();
                $reply = Reply::all();
                 foreach ($reply as $r) {
                     if ($r->best_answer == 1) {
                         array_push($solved, $r->discussion_id);
                     }
                 }


                $discussions = Discussion::whereIn('id',$solved)->orderBy('created_at', 'desc')->paginate(3);
                // orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==7){

                $notSolved = array();
                $reply = Reply::all();
                 foreach ($reply as $r) {
                     if (!$r->best_answer) {
                         array_push($notSolved, $r->discussion_id);
                     }
                 }


                $discussions = Discussion::whereIn('id',$notSolved)->orderBy('created_at', 'desc')->paginate(3);
                // orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);

            }elseif(request()->query('ss') ==8){

                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                return view('forum.forum', ['discussions' => $discussions]);
            }

        }else{

            $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
            return view('forum.forum', ['discussions' => $discussions]);
        }


    }

    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();

        return view('forum.channel')->with('discussions', $channel->discussions()->paginate(5))
                                    ->with('chan', $channel);
    }
}

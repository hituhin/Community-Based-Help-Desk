<?php

namespace App\Http\Controllers\forum;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use App\Watcher;
use Illuminate\Http\Request;

class WatchersController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }
    public function watch($id)
    {
        Watcher::create([
            'discussion_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You are watching this discussion.');

        return redirect()->back();
    }

    public function unwatch($id)
    {
        $watcher =  Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

        $watcher->delete();

        Session::flash('success', 'You are no longer watching this discussion.');

        return redirect()->back();
    }
}

<?php

namespace App\Providers;

use View;
use App\Channel;
use App\Meeting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\facades\schema;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        schema::defaultStringLength(191);
        // if (Auth::check()) {

            View::share('channels', Channel::all());
        // }
        // 
        // 
        $meetings= Meeting::where(['status'=> 1])
                        ->where('end_time', '<=', now())
                        ->get();
        if($meetings->count() > 0){
          foreach ($meetings as $meeting) {
              $meeting->update([
                  'status' =>2
              ]);
          }
        }       

        
    }
}

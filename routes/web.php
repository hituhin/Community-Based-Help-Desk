<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//@if(in_array(request()->path(), ['give-feedback', 'feedback'])) open @endif
//
//@if(in_array(request()->path(), ['collaboration-request'])) active @endif
//
//
//Process means 'a series of actions or steps taken in order to achieve a particular end'. Progress means 'forward or onward movement towards a destination'.
//https://stackoverflow.com/questions/21204305/rerendering-events-in-fullcalendar-after-ajax-database-update

 Route::get('/', function () {
     return view('frontpage');
 });


 Route::get('/cc', function () {

    $next_meeting= App\Feedback::findOrFail(3);

    return $next_meeting->user;
    
 });


 Route::get('/discuss/sigle/1', function () {
     return view('forum.show');
 });

// Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {

  // ->> Multi Auth Start
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  // <<- Multi Auth End
  

  // ->> users
  Route::get('/user-profile/{id}', 'AdminActionController@profile')->name('admin.user-profile');

  Route::get('/users', 'AdminUsersController@index')->name('admin.users');
  Route::post('/user-deac/{id}', 'AdminUsersController@deactive')->name('admin.user.deac');
  Route::get('/deactive-users', 'AdminUsersController@deactiveIndex')->name('admin.deactive.index');
  Route::post('/user-active/{id}', 'AdminUsersController@active')->name('admin.user.active');

// admin
  Route::get('/create', 'AdminController@create')->name('admin.create');
  Route::post('/store', 'AdminController@store')->name('newadmin');

  Route::get('/all-admins', 'AdminController@allAdmin')->name('alladmin');
  Route::get('/deactive-admins', 'AdminController@deactiveIndex')->name('deactiveadmin');

  Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
  Route::Post('/update/{id}', 'AdminController@update')->name('admin.update');

  Route::Post('/deactive/{id}', 'AdminController@deactive')->name('admin.deactive');
  Route::Post('/active/{id}', 'AdminController@active')->name('admin.active');
  Route::Post('/delete/{id}', 'AdminController@delete')->name('admin.delete');


  // skills
  Route::get('/skills', 'AdminActionController@skills')->name('admin.skills');
  Route::post('/skill-add', 'AdminActionController@addSkill')->name('skill.add');
  Route::post('/skill-edit/{id}', 'AdminActionController@editSkill')->name('skill.edit');
  Route::post('/skill-delete/{id}', 'AdminActionController@deleteSkill')->name('skill.delete');

  // channels
  Route::get('/channels', 'AdminActionController@channels')->name('admin.channels');
  Route::post('/channel-add', 'AdminActionController@addChannel')->name('channel.add');
  Route::post('/channel-edit/{id}', 'AdminActionController@editChannel')->name('channel.edit');
  Route::post('/channel-delete/{id}', 'AdminActionController@deleteChannel')->name('channel.delete');
  Route::post('/channel-delete/{id}', 'AdminActionController@deleteChannel')->name('channel.delete');


  // profile
  Route::get('/change-passwo/', 'AdminController@changePs')->name('admin.profile');

  Route::get('/change-password/', 'AdminController@changePass')->name('admin.changepass');
  Route::post('/change-password/', 'AdminController@changePassword')->name('admin.changepassw');
  Route::get('/editprofile/', 'AdminController@editProfile')->name('admin.editprofile');
  Route::post('/updateprofile/{id}', 'AdminController@updateProfile')->name('admin.updateprofile');

  //Meeting
  Route::get('/meeting/', 'AdminActionController@meeting')->name('admin.meeting');
  Route::get('/new-event/', 'AdminActionController@newEvent')->name('new.event');
  Route::post('/store-event/', 'AdminActionController@storeEvent')->name('admin.storeevent');
  
});


/*                                                                  
|----------------------------------*
| User -->>              *
|----------------------------------*
*/

//profile

Route::get('/update-step/', 'User\UserController@updateStep')->name('update-step');
Route::get('/blocked-step/', 'User\UserController@blockedStep')->name('blocked-step');
Route::post('/update-stepconf/{id}', 'User\UserController@updateConf')->name('update-stepconf');

Route::get('/editprofile/', 'User\UserController@editProfile')->name('editprofile');

Route::get('/showprofile/', 'User\UserController@userProfile')->name('view.profile');
Route::get('/profile/{id}', 'User\UserController@profile')->name('vi.profile');
Route::post('/updateprofile/{id}', 'User\UserController@updateProfile')->name('updateprofile');
Route::get('/change-password/', 'User\UserController@changePass')->name('changepass');
Route::post('/change-password/', 'User\UserController@changePassword')->name('changepassw');


//connect search
Route::get('/search', 'User\UserController@search')->name('search.profile');






// Route::get('/profile', 'DashboardController@profile')->name('view.profile');



//chat

Route::get('/chat', 'Chat\MessageController@index')->name('chat');
Route::get('/users', 'Chat\MessageController@users')->name('users');
Route::get('/private', 'Chat\MessageController@private')->name('private');
Route::get('/private-messages/{user}', 'Chat\MessageController@privateMessages')->name('privateMessages');
Route::get('/private-messages-user/{user}', 'Chat\MessageController@privateMessagesUser')->name('privateMessagesUser');
Route::post('/private-messages/{user}', 'Chat\MessageController@sendPrivateMessage')->name('privateMessages.store');



//connect
// by user and auth id
Route::get('/connect-req/{user_id}', 'User\ConnectController@connectRequest')->name('connect.req');
Route::get('/connect-act/{user_id}', 'User\ConnectController@acceptRequest')->name('connect.acc');
Route::get('/conncet-rej/{user_id}', 'User\ConnectController@rejectRequest')->name('connect.rej');
Route::get('/connect-canc/{user_id}', 'User\ConnectController@cancelRequest')->name('connect.canc');

// by conncet id
Route::get('/connect-accept/{con_id}', 'User\ConnectController@acceptConnectR')->name('connect.accept');
Route::get('/conncet-reject/{con_id}', 'User\ConnectController@rejectConnectR')->name('connect.reject');
Route::get('/connect-cancel/{con_id}', 'User\ConnectController@cancelConnectR')->name('connect.cancel');


Route::get('/connect-remove/{con_id}', 'User\ConnectController@removeConnect')->name('connect.remove');
Route::get('/connect-block/{con_id}', 'User\ConnectController@blockConnect')->name('connect.block');
Route::get('/connect-unblock/{con_id}', 'User\ConnectController@unBlockConnect')->name('connect.unblock');


Route::get('/new-connect-reqeust', 'User\ConnectController@newConnectReqList')->name('cnew.list');
Route::get('/user-connect-reqeust', 'User\ConnectController@userConnectReqList')->name('unew.list');
Route::get('/user-connect-list', 'User\ConnectController@getAllConnects')->name('connect.list');
Route::get('/user-block-list', 'User\ConnectController@userBlockedList')->name('cblocklist');











// all meeting

Route::get('/collaboration-request', 'MeetingController@getCollaborationRequest')->name('collaboration-newreq');
Route::get('/user-collaboration-request', 'MeetingController@getUserCollaRequest')->name('collaboration-userreq');

Route::post('/accept-meeting/{id}', 'MeetingController@acceptMeeting')->name('accept.meeting');
Route::get('/reject-meeting/{id}', 'MeetingController@rejectMeeting')->name('reject.meeting');
Route::get('/cancel-meeting/{id}', 'MeetingController@cancelMeeting')->name('cancel.meeting');
Route::get('/single-meeting/{id}', 'MeetingController@singleMeeting')->name('single.meeting');
Route::post('/update-meeting/{id}', 'MeetingController@update')->name('update.meeting');


Route::get('/all-collaboration', 'MeetingController@index')->name('allevents');
Route::get('/provider-collaboration', 'MeetingController@getProviderMeeting')->name('provider.meeting');
Route::get('/provider-col-ajx', 'MeetingController@getProviderColAjx')->name('provider.meeting.ajx');
Route::get('/seeker-collaboration', 'MeetingController@getSeekerMeeting')->name('seeker.meeting');
Route::get('/seeker-col-ajx', 'MeetingController@getSeekerColAjx')->name('seeker.meeting.ajx');


Route::post('/addevent', 'MeetingController@store')->name('addevent');

// Route::get('/addevent', 'MeetingController@create')->name('addeventpage');


// feed back

Route::get('/feedback', 'FeedbackController@index')->name('feedback');
Route::get('/give-feedback', 'FeedbackController@review')->name('feedback.review');
Route::post('/submit-feedback', 'FeedbackController@store')->name('feedback.store');


Route::get('/notifications', 'User\UserController@userNotifcation')->name('user.notifications');








// <<-- User Dashboard End
// 

/*                                                                  
|----------------------------------*
| Forum Start    <<--              *
|----------------------------------*
*/

Route::get('/discuss', 'Forum\ForumController@discuss')->name('forum.discuss');

Route::get('/discuss/show', function(){
  return view('forum.show');
})->name('discussion');



Route::get('/forum', 'Forum\ForumsController@index')->name('forum');
// Route::get('/forum', 'Forum\ForumsController@index')->name('forum');
Route::get('discussion/{slug}', 'Forum\DiscussionsController@show')->name('discussion');
Route::get('channel/{slug}', 'Forum\ForumsController@channel')->name('channel');



//auth start

Route::resource('channels', 'Forum\ChannelsController');
Route::get('discussion/create/new', [
        'uses' => 'Forum\DiscussionsController@create',
        'as' => 'discussions.create'
    ]);
Route::post('discussions/store', [
    'uses' => 'Forum\DiscussionsController@store',
    'as' => 'discussions.store'
]);

Route::post('/discussion/reply/{id}', [
    'uses' => 'Forum\DiscussionsController@reply',
    'as' => 'discussion.reply' 
]);

Route::get('/reply/like/{id}', [
    'uses' => 'Forum\RepliesController@like',
    'as' => 'reply.like'
]);

Route::get('/reply/unlike/{id}', [
    'uses' => 'Forum\RepliesController@unlike',
    'as' => 'reply.unlike'
]);

Route::get('/discussion/watch/{id}', [
    'uses' => 'Forum\WatchersController@watch',
    'as' => 'discussion.watch'
]);

Route::get('/discussion/unwatch/{id}', [
    'uses' => 'Forum\WatchersController@unwatch',
    'as' => 'discussion.unwatch'
]);

Route::get('/discussion/best/reply/{id}', [
    'uses' => 'Forum\RepliesController@best_answer',
    'as' => 'discussion.best.answer'
]);







// Route::get('/discuss/channels', 'forum\ForumController@discuss')->name('forum.discuss');
// 
// Route::get('discuss/channels/laravel/', 'forum\ForumController@discuss')->name('forum.discuss');



// <<-- Forum End



 /*                                                                  
|----------------------------------*
| User Dashboard <<--              *
|----------------------------------*
*/


// <<-- User Dashboard End
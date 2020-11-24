<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr" class="loading">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- form app start-->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- form app end-->


    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->


    <link rel="shortcut icon" type="image/png" href="{{ asset('app-assets/images/logo/cbhd-fav.png') }}"/>
    <link rel="shortcut icon" type="image/png" href="{{ asset('app-assets/images/logo/cbhd-fav.png') }}"/>
      

    <title>Community Based Help Desk @yield('title')</title>
    

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
{{-- app provided start--}}


    {{-- BEGIN VENDOR CSS--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    {{-- font icons--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/icomoon.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/flag-icon-css/css/flag-icon.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/pace.css"> --}}
    {{-- END VENDOR CSS--}}
    {{-- BEGIN CBHD CSS--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    {{-- END CBHD CSS--}}
    {{-- BEGIN Page Level CSS--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    {{-- END Page Level CSS--}}
    {{-- BEGIN Custom CSS--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- END Custom CSS--}}
{{-- app provided end--}}
    
    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">


    <style>
       .conImageCenter {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        background: white;
        padding: 8px;
        display: none;
        z-index: 999999;
       }
      
      .content-body {
        overflow: hidden;
      }

      #forumlist .list-group-item.active, #forumlist .list-group-item.active:focus {
        z-index: 2;
         color: #555; 
        text-decoration: none;
        background-color: #7ed6df;
        border-color: #7ed6df;
      }

      img.brand-logo {
          margin-top: -10px;
      }


/*      footer.footer.footer-static.footer-light.navbar-border {
          position: fixed;
          bottom: 0;
          left: 0;
          width: 100%;
      }*/
    </style>

    @yield('style')
  </head>


  <body  data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<div>

    {{-- navbar-fixed-top--}}
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item">

              <a href="{{ route('home') }}" class="navbar-brand nav-link">



              {{-- <img alt="branding logo" src="{{ asset('app-assets/images/logo/a-logo-light.png" data-expand="{{ asset('app-assets/images/logo/CBHD-logo-light.png" data-collapse="{{ asset('app-assets/images/logo/CBHD-logo-small.png" class="brand-logo">               --}}


              <img alt="branding logo" src="{{ asset('app-assets/images/logo/cbhd-white.png') }}" data-expand="{{ asset('app-assets/images/logo/cbhd-white.png') }}" data-collapse="{{ asset('app-assets/images/logo/cbhd-small.png') }}" class="brand-logo">


            </a>
            </li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>

              <li class="nav-item hidden-sm-down"><a href="/search" class="nav-link nav-link-label hidden-xs"><i class="ficon icon-search6"></i></a></li>


             {{--  --}}

              {{-- <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link" style="padding: 1.4rem 0.6rem;"><i class="ficon icon-search7"></i></a></li> --}}

              
              
            </ul>
            <ul class="nav navbar-nav float-xs-right">



              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">{{auth()->user()->unreadNotifications->count()}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">{{auth()->user()->unreadNotifications->count()}} New</span></h6>
                  </li>
                  <li class="list-group scrollable-container">
@if (auth()->user()->unreadNotifications()->count() > 0)
  {{-- expr --}}

 @foreach (auth()->user()->unreadNotifications()->take(3)->get() as $notification)


                    <a href="{{ $notification->data['url'] }}" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-file icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading text-dark" style="color: #000">{{ $notification->data['text'] }} !</h6>
                          {{-- <p class="notification-text font-small-3 text-muted">{{$notification->created_at->diffForHumans()}}</p><small> --}}
                            <time datetime="2015-06-11T18:29:20+08:00" style="margin-bottom: 4px;
display: inline-block;" class="media-meta text-muted">{{$notification->created_at->diffForHumans()}}</time></small>
                        </div>
                      </div>
                    </a>
@endforeach

@else
                      <a href="avascript:void(0)" class="list-group-item">
                        <div class="media" style="padding: 4px;">
                          <div class="media-left valign-middle"><i class="icon-file icon-bg-circle bg-cyan"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading text-dark" style="color: #000">You don't have any new notification!</h6>
                            {{-- <p class="notification-text font-small-3 text-muted">{{$notification->created_at->diffForHumans()}}</p><small> --}}
                          </div>
                        </div>
                      </a>
@endif


                {{--    <a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have connect request!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                        </div>
                      </div>
                    </a>
 --}}

            


                    </li>
                  <li class="dropdown-menu-footer"><a href="{{ route('user.notifications') }}" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                </ul>
              </li>



{{-- //messages --}}

    




              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online" ><img src="{{Auth::user()->image}}" alt="avatar" style="max-width: 31px!important;
    max-height: 31px !important;
    width: 31px !important;
    height: 31px !important;
    border-radius: 50% !important;"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('editprofile') }}" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="{{ route('chat') }}" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="{{ route('allevents') }}" class="dropdown-item"><i class="icon-clipboard2"></i> Meeting</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-power3"></i> {{ __('Logout') }}</a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    {{-- ////////////////////////////////////////////////////////////////////////////--}}


    {{-- main menu--}}
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      {{-- main menu header--}}






{{-- header extra space  --}}


      {{-- <div class="main-menu-header"> --}}
      {{-- </div> --}}





      {{-- / main menu header--}}
      {{-- main menu content--}}
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          


          <li class=" nav-item "><a href="#"><i class="icon-home3"></i><span  class="menu-title">Dashboard </span> </a>
            <ul class="menu-content">
              <li class="@if(in_array(request()->path(), ['home','forum'])) active  @endif"><a href="/home" class="menu-item">Home</a>
              <li class="@if(in_array(request()->path(), ['home','forum'])) active  @endif"><a href="{{ route('forum') }}" class="menu-item">Forum</a>
              </li>
            </ul>
          </li>


          <li class=" nav-item @if(in_array(request()->path(), ['collaboration-request'])) open  @endif"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Provide Help</span></a>
            <ul class="menu-content">
              <li class="@if(in_array(request()->path(), ['collaboration-request'])) active  @endif"><a href="{{ route('collaboration-newreq') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">Accept meeting</a>
              </li>
              
              <li><a href="{{ route('forum') }}" data-i18n="nav.page_layouts.static_layout" class="menu-item">Reply in forum</a>
              </li>

            </ul>
          </li>







          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Seek Help</span></a>
            <ul class="menu-content">

              <li><a href="{{ route('forum.discuss') }}" data-i18n="nav.search_pages.search_website" class="menu-item">Post in Forum</a>
              </li>


              <li><a href="{{ route('search.profile') }}" data-i18n="nav.search_pages.search_page" class="menu-item">Search Help Provider</a>
              </li>

            {{--   <li><a href="{{ route('chat') }}" data-i18n="nav.search_pages.search_website" class="menu-item">Make Collaboration</a>
              </li>
 --}}

            </ul>
          </li>


          <li class=" nav-item"><a href="#"><i class="icon-eye6"></i><span data-i18n="nav.icons.main" class="menu-title">Forum</span></a>
            <ul class="menu-content">

              


             {{--  <li><a href="{{ route('forum.discuss') }}" data-i18n="nav.icons.icons_feather" class="menu-item">Add New Post</a>
              </li> --}}
              
              <li><a href="/forum?ss=6" data-i18n="nav.icons.icons_ionicons" class="menu-item">All Solved Posts</a>
              </li>


              <li><a href="/forum?ss=7" data-i18n="nav.icons.icons_ionicons" class="menu-item">Not Solved Yet</a>
              </li>


              <li><a href="/forum?ss=2" data-i18n="nav.icons.icons_fps_line" class="menu-item">Your Post</a>
              </li>
              
            </ul>
          </li>








          <li class=" nav-item @if(in_array(request()->path(), ['search', 'new-connect-reqeust', 'user-connect-reqeust', 'user-connect-list','user-block-list'])) open @endif"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Connect</span></a>
            <ul class="menu-content">
              <li class="@if(in_array(request()->path(), ['search'])) active @endif"><a href="{{ route('search.profile') }}" data-i18n="nav.content.content_grid" class="menu-item">Add New Connent</a>
              </li>

              <li class="@if(in_array(request()->path(), ['new-connect-reqeust'])) active @endif"><a href="{{ route('cnew.list') }}" data-i18n="nav.content.content_grid" class="menu-item">Accept Request</a>
              </li>


              <li class="@if(in_array(request()->path(), ['user-connect-reqeust'])) active @endif"><a href="{{ route('unew.list') }}" data-i18n="nav.content.content_grid" class="menu-item">Pending Request</a>
              </li>
            
              <li class="@if(in_array(request()->path(), ['user-connect-list'])) active @endif"><a href="{{ route('connect.list') }}" data-i18n="nav.content.content_typography" class="menu-item">All Connents</a>
              </li>
              <li class="@if(in_array(request()->path(), ['user-block-list'])) active @endif"><a href="{{ route('cblocklist') }}" data-i18n="nav.content.content_grid" class="menu-item">Block List</a>
              </li>


            </ul>
          </li>


          <li class=" nav-item @if(in_array(request()->path(), ['chat'])) active @endif"><a href="{{ route('chat') }}"><i class="icon-ios-albums-outline"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Message</span></a>
          </li>



          <li class=" nav-item @if(in_array(request()->path(), ['user-collaboration-request', 'seeker-collaboration', 'provider-collaboration'])) open @endif"><a href="#"><i class="icon-bar-graph-2"></i><span data-i18n="nav.google_charts.main" class="menu-title">Meeting</span></a>
            <ul class="menu-content">
              <li class="@if(in_array(request()->path(), ['user-collaboration-request'])) active @endif"><a href="{{ route('collaboration-userreq') }}" data-i18n="nav.google_charts.google_pie_charts" class="menu-item">Pending Request</a>
              </li>
              <li class="@if(in_array(request()->path(), ['seeker-collaboration'])) active @endif"><a href="{{ route('seeker.meeting') }}" data-i18n="nav.google_charts.google_bar_charts" class="menu-item">As Help Seeker</a>
              </li>
              <li class="@if(in_array(request()->path(), ['provider-collaboration'])) active @endif"><a href="{{ route('provider.meeting') }}" data-i18n="nav.google_charts.google_line_charts" class="menu-item">As Help Provider</a>
              </li>
            </ul>
          </li>


          <li class=" nav-item @if(in_array(request()->path(), ['all-collaboration'])) active @endif"><a href="{{ route('allevents') }}"><i class="icon-paper"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">All Meeting</span></a>
          </li>


          <li class=" nav-item @if(in_array(request()->path(), ['showprofile', 'editprofile', 'change-password'])) open @endif"><a href="#"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Manage Profile</span></a>
            <ul class="menu-content">
              <li class="@if(in_array(request()->path(), ['showprofile'])) active @endif"><a href="{{ route('view.profile') }}" data-i18n="nav.components.component_alerts" class="menu-item">Your Profile</a>
              </li>
              <li class="@if(in_array(request()->path(), ['editprofile'])) active @endif"><a href="{{ route('editprofile') }}" data-i18n="nav.components.component_alerts" class="menu-item">Edit Profile</a>
              </li>

              <li class="@if(in_array(request()->path(), ['change-password'])) active @endif"><a href="{{ route('changepass') }}" data-i18n="nav.components.component_alerts" class="menu-item">Change Password</a>
              </li>
             
  
            </ul>
          </li>




          <li class=" nav-item @if(in_array(request()->path(), ['give-feedback', 'feedback'])) open @endif"><a href="#"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Feedback</span></a>
            <ul class="menu-content">

              <li class="@if(in_array(request()->path(), ['give-feedback', ])) active @endif"><a href="{{ route('feedback.review') }}" data-i18n="nav.cards.card_charts" class="menu-item">Give Feedback</a>
              <li class="@if(in_array(request()->path(), ['feedback'])) active @endif"><a href="{{ route('feedback') }}" data-i18n="nav.cards.card_charts" class="menu-item">All Feedback</a>
              </li>

            {{--   <li><a href="#" data-i18n="nav.cards.card_statistics" class="menu-item">All Feedback</a>
              </li> --}}
              
            </ul>
          </li>


{{-- Terms and condition --}}

{{-- 
          <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
          </li>


          
          <li class=" nav-item"><a href="#"><i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Terms and conditions</span></a>
          </li> --}}


        </ul>
      </div>
      {{-- /main menu content--}}
      {{-- main menu footer--}}
      {{-- include includes/menu-footer--}}
      {{-- main menu footer--}}
    </div>
    {{-- / main menu--}}


    <div class="app-content content container-fluid">
      <div class="content-wrapper " id="appidd">


{{--         <div class="content-header row">
        </div>
        <div class="content-body"> --}}



          {{-- start --}}




        @yield('content')







        {{-- </div>  content-body --}}
      </div> {{-- content-wrapper --}}
    </div> {{-- app-content content container-fluid --}}

</div> <!-- id -->

    {{-- ////////////////////////////////////////////////////////////////////////////--}}


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="#" target="_blank" class="text-bold-800 grey darken-2">CBHD </a>, All rights reserved. </span>

        {{-- <span class="float-md-right d-xs-block d-md-inline-block">Made with <i class="icon-heart5 pink"></i></span> --}}

      </p>
    </footer>

 

 <script src="{{asset('js/libs.js')}}"></script>
 <script src="{{asset('js/app.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>

    <script>
        @if(Session::has('success'))
  
            iziToast.success({
            timeout: 8000,
            title: 'Success!',
            message: "{{ Session::get('success') }}"
              });
        @endif
        @if(Session::has('info'))

          iziToast.info({
            title: 'Hello',
            timeout: 8000,
            message: "{{ Session::get('info') }}"
              });

        @endif

        @if(Session::has('error'))

          iziToast.error({
            title: 'Error!',
            timeout: 8000,
            message: "{{ Session::get('error') }}"
              });

        @endif

    </script>












     @yield('script')

  </body>
</html>

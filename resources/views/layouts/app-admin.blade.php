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
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> --}}

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

      img.brand-logo {
          margin-top: -10px;
      }
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

              <a href="#" class="navbar-brand nav-link">



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



 









              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">

                <img src="{{Auth::guard('admin')->user()->photo}}" alt="avatar" style="max-width: 31px!important;
    max-height: 31px !important;
    width: 31px !important;
    height: 31px !important;
    border-radius: 50% !important;">



    <i></i></span><span class="user-name">{{Auth::guard('admin')->user()->name}}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('admin.editprofile') }}" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="{{ route('admin.meeting') }}" class="dropdown-item"><i class="icon-clipboard2"></i> Meeting</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-power3"></i> {{ __('Logout') }}</a>


                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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
 {{--      <div class="main-menu-header">

      </div> --}}
      {{-- / main menu header--}}
      {{-- main menu content--}}
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          


          <li class=" nav-item"><a href="/admin"><i class="icon-home3"></i><span  class="menu-title">Dashboard </span> </a>
          
          </li>

@if(Auth::guard('admin')->user()->status != 0)

          <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Users</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('admin.users') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">All users</a>
              </li>
              
              <li><a href="{{ route('admin.deactive.index') }}" data-i18n="nav.page_layouts.static_layout" class="menu-item">Deactive users</a>
              </li>

            </ul>
          </li>





      @if(Auth::guard('admin')->user()->role == 1)

          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Administrators</span></a>
            <ul class="menu-content">

              <li><a href="{{ route('admin.create') }}" data-i18n="nav.search_pages.search_website" class="menu-item">Add new admin</a>
              </li>


              <li><a href="{{ route('alladmin') }}" data-i18n="nav.search_pages.search_page" class="menu-item">All admins</a>
              </li>
              <li><a href="{{ route('deactiveadmin') }}" data-i18n="nav.search_pages.search_page" class="menu-item">Deactive admins</a>
              </li>



            </ul>
          </li>

      @endif

          <li class=" nav-item"><a href="{{ route('admin.skills') }}"><i class="icon-eye6"></i><span data-i18n="nav.icons.main" class="menu-title">Skills</span></a>
          </li>
      

          <li class=" nav-item"><a href="#"><i class="icon-bar-graph-2"></i><span data-i18n="nav.google_charts.main" class="menu-title">Meeting</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('new.event') }}" data-i18n="nav.google_charts.google_bar_charts" class="menu-item">Add new event</a>
              </li>
              <li><a href="{{ route('admin.meeting') }}" data-i18n="nav.google_charts.google_line_charts" class="menu-item">All meetings</a>
              </li>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="{{ route('admin.channels') }}"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Forum</span></a>
            
          </li>












          <li class=" nav-item"><a href="#"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Manage Profile</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('admin.editprofile') }}" data-i18n="nav.components.component_alerts" class="menu-item">Edit Profile</a>
              </li>

              <li><a href="{{ route('admin.changepass') }}" data-i18n="nav.components.component_alerts" class="menu-item">Change Password</a>
              </li>
             
  
            </ul>
          </li>







@endif







        </ul>
      </div>
      {{-- /main menu content--}}
      {{-- main menu footer--}}
      {{-- include includes/menu-footer--}}
      {{-- main menu footer--}}
    </div>
    {{-- / main menu--}}


    <div class="app-content content container-fluid">
      <div class="content-wrapper" id="appidd">


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

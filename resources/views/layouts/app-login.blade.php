<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <style type="text/css">
            .invalid-feedback p, .invalid-feedback {
                color: red;
                margin-top: -11px;
            }
            img.brand-logo {
                margin-top: -10px;
                width: 125%;
            }

            .nav-tt{
                font-size: 18px;
                margin-right: 65px;
            }
            li.nav-item.nav-tt-item {
                margin-right: 20px;
            }   
            .navbar-container.content.container {
                width: 100%;
            }
        </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('style')
</head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">


    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
          <div class="navbar-wrapper">
            <div class="navbar-header">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active"><i class="icon-menu5 font-large-1"></i></a></li>
                <li class="nav-item"><a href="/" class="navbar-brand nav-link"><img alt="logo" src="{{ asset('app-assets/images/logo/cbhd.png') }}" data-expand="{{ asset('app-assets/images/logo/cbhd.png') }}" data-collapse="{{ asset('app-assets/images/logo/cbhd.png') }}" class="brand-logo"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
              </ul>
            </div>
            <div class="navbar-container content container">
              <div id="navbar-mobile" class="collapse navbar-toggleable-sm">

                <ul class="nav navbar-nav float-xs-right nav-tt">
                 

                  {{-- <li class="nav-item nav-tt-item"><a href="#"  class="nav-link nav-link-label">Login</a>
                  </li>
                  <li class=" nav-item nav-item"><a href="#" class="nav-link nav-link-label">Register</a>
                  </li> --}}
                  


                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>

              </div>
            </div>
          </div>
        </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

          




        @yield('content')


            


        </div>
      </div>
    </div>


 <script src="{{asset('js/libs.js')}}"></script>
 <script src="{{asset('js/app.js')}}"></script>

 @yield('script')

</body>
</html>

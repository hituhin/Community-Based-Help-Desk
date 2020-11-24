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
            .invalid-feedback p {
                color: red;
                margin-top: -11px;
            }
            img.brand-logo {
                margin-top: -14px;
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
</head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
















    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
          <div class="navbar-wrapper">
            <div class="navbar-header">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active"><i class="icon-menu5 font-large-1"></i></a></li>
                <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="logo" src="{{ asset('app-assets/images/logo/cbhd.png') }}" data-expand="{{ asset('app-assets/images/logo/cbhd.png') }}" data-collapse="{{ asset('app-assets/images/logo/cbhd.png') }}" class="brand-logo"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
              </ul>
            </div>
            <div class="navbar-container content container">
              <div id="navbar-mobile" class="collapse navbar-toggleable-sm">

                <ul class="nav navbar-nav float-xs-right nav-tt">
                 

                  <li class="nav-item nav-tt-item"><a href="#"  class="nav-link nav-link-label">Login</a>
                  </li>
                  <li class=" nav-item nav-item"><a href="#" class="nav-link nav-link-label">Register</a>
                  </li>
                  
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
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    {{-- <div class="p-1"><img src="../../app-assets/images/logo/fdg.png" alt="branding logo"></div> --}}
                    {{-- <div class="p-1"><h3>Community Based Help Desk</h3></div> --}}
                </div>
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>Community Based Help Desk</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="POST"  action="{{ route('login') }}" novalidate>
                        @csrf
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="email" id="email" style="margin-bottom: 10px !important;" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email"  autofocus>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" id="password"  class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    {{-- <input type="checkbox" id="remember-me" class="chk-remember"> --}}
                                    <input class="chk-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a></div>
                        </fieldset>
                        <button type="submit" class="btn btn-success btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="{{ route('password.request') }}" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">Need account? <a href="/signup" class="card-link">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>


















  </body>






 <script src="{{asset('js/libs.js')}}"></script>
 <script src="{{asset('js/app.js')}}"></script>

</body>
</html>

@extends('layouts.app-login')
@section('content')
<section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    {{-- <div class="p-1"><img src="{{ asset('app-assets/images/logo/cbhd.png') }}" alt="branding logo"></div> --}}
                    {{-- <div class="p-1"><h6>User Login</h6></div> --}}
                </div>
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>User Register</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="POST"  action="{{ route('register') }}" novalidate>
                        @csrf

                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="name" id="name" style="margin-bottom: 10px !important;" class="form-control form-control-lg input-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  placeholder="Your Name"  autofocus>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="email" id="email" style="margin-bottom: 10px !important;" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="Email Address"  autofocus>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="password" id="password" style="margin-bottom: 10px !important;" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required >
                            <div class="form-control-position">
                                <i class="icon-lock4"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" style="margin-top: 6px;" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="password" id="password" style="margin-bottom: 10px !important;"  class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required >
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            
                        </fieldset>

                        <button type="submit" class="btn btn-success btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
                    </form>
                </div>
            </div>
            {{-- <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="{{ route('password.request') }}" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">Need account? <a href="/signup" class="card-link">Sign Up</a></p>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection
























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
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>User Login</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="POST"  action="{{ route('login') }}" novalidate>
                        @csrf
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="email" id="email" style="margin-bottom: 10px !important;" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email"  autofocus>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" id="password"  class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password">
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
@endsection
























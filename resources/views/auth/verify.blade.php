@extends('layouts.app-login')
@section('content')
<section class="flexbox-container">
    <div class="col-md-6 offset-md-3 col-xs-10 offset-xs-1  box-shadow-2 p-0" style="margin-top: -50px;">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    {{-- <div class="p-1"><img src="{{ asset('app-assets/images/logo/cbhd.png') }}" alt="branding logo"></div> --}}
                    {{-- <div class="p-1"><h6>User Login</h6></div> --}}
                </div>
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>Verify Your Email Address</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block" style="margin-top: -20px;">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert" style="color: #fff !important;">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
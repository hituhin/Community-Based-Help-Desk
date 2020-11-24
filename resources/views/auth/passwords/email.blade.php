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
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>Reset your password</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="font-size: 15px !important; margin-top: -28px; color:#fff !important;">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
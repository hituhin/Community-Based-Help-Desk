{{-- You can't reply to this conversation. --}}


@extends('layouts.app-admin')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
    .has-error {
        border-color: red !important;
    }
    .help-block {
        color: red;
    }
</style>
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Change Password</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">rofile
        </li>
      </ol>
    </div>
  </div>
</div>


<div class="content-body">{{-- content-body start --}}


<!-- Basic Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card" >
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Change Password </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            {{-- <li><a data-action="reload"><i class="icon-reload"></i></a></li> --}}
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            {{-- <li><a data-action="close"><i class="icon-cross2"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block" >
@if (session('successP'))
    <div class="alert alert-success" style="font-size: 15px; width: 70%; margin: auto; margin-bottom: 6px;">
        {{ session('successP') }}
    </div>
@endif

<form class="form" method="POST" action="{{ route('admin.changepassw') }}">
         {{ csrf_field() }}
    <div class="form-body" style="width: 70%; margin: auto;">

        <div class="form-group ">
            <label for="donationinput1">Current Password</label>
            <input type="password" id="donationinput1" class="form-control square {{ $errors->has('current-password') ? ' has-error' : '' }}" placeholder="name" name="current-password" required>

            @if ($errors->has('current-password'))
                <span class="help-block">
                   {{ $errors->first('current-password') }}
                </span>
            @endif
            @if (session('errorP'))
                <span class="help-block">
                    {{ session('errorP') }}
                </span>
            @endif

        </div>

        <div class="form-group ">
            <label for="donationinput1">New Password</label>
            <input type="password" id="donationinput1" class="form-control square {{ $errors->has('new-password') ? ' has-error' : '' }}" placeholder="name" name="new-password" required>

            @if ($errors->has('new-password'))
                <span class="help-block">
                   {{ $errors->first('new-password') }}
                </span>
            @endif
        </div>


        <div class="form-group">
            <label for="donationinput1">Confirm New Password</label>
            <input type="password" id="donationinput1" class="form-control square {{ $errors->has('new-password') ? ' has-error' : '' }}" placeholder="name" name="new-password_confirmation" required>
        </div>


        
    <div class="form-group right">
        <button type="submit" class="btn btn-success">
            <i class="icon-check2"></i> Save Changes
        </button>
    </div>
</form>
                 
                        
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Basic Tables end -->






</section>







</div> {{-- content-body end --}}

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.selectskill').select2();
    });

</script>
@endsection

@extends('layouts.app-user')

@section('style')
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Add New Meeting</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">All meeting</a>
        </li>
        <li class="breadcrumb-item active">New new meeting
        </li>
      </ol>
    </div>
  </div>
</div>


<div class="content-body">{{-- content-body start --}}



<!-- Basic Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Meeting</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        {{-- <li><a data-action="reload"><i class="icon-reload"></i></a></li> --}}
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> {{session('success')}}
    </div> 
@endif

                    <p class="card-text">You can make a meeting here.</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}

{{-- 
    @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach

            </ul>
        </div>

    @endif --}}
                   
                    
<form class="form" action="{{route('addevent')}}" method="POST">
    <div class="form-body">

       {{--  <div class="form-group">
            <label for="timesheetinput1">Employee Name</label>
            <div class="position-relative has-icon-left">
                <input type="text" id="timesheetinput1" class="form-control" placeholder="employee name" name="employeename">
                <div class="form-control-position">
                    <i class="icon-head"></i>
                </div>
            </div>
        </div> --}}
        @csrf
        <div class="form-group">
            <label for="place">Place</label>
            <div class="position-relative has-icon-left">
                <input type="text" id="place" class="form-control @error('place') is-invalid @enderror" placeholder="Place"  value="{{old('place')}}" name="place" required autocomplete="place" autofocus>
                <div class="form-control-position">
                    <i class="icon-android-compass"></i>
                </div>

                @error('place')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <div class="position-relative has-icon-left">
                <input type="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}" required name="date">
                <div class="form-control-position">
                    <i class="icon-calendar5"></i>
                </div>

                @error('date')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="starttime">Start Time</label>
                    <div class="position-relative has-icon-left">
                        <input type="time" id="starttime" class="form-control @error('starttime') is-invalid @enderror" value="{{old('starttime')}}" required name="starttime">
                        <div class="form-control-position">
                            <i class="icon-clock5"></i>
                        </div>

                        @error('starttime')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endtime">End Time</label>
                    <div class="position-relative has-icon-left">
                        <input type="time" id="endtime" class="form-control @error('endtime') is-invalid @enderror" value="{{old('endtime')}}" required name="endtime">
                        <div class="form-control-position">
                            <i class="icon-clock5"></i>
                        </div>

                        @error('endtime')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <div class="position-relative has-icon-left">
                <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Describe your problem here" required>{{old('description')}}</textarea>
                <div class="form-control-position">
                    <i class="icon-file2"></i>
                </div>
                @error('description')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-actions right">
        <button type="button" class="btn btn-warning mr-1">
            <i class="icon-cross2"></i> Cancel
        </button>
        <button type="submit" class="btn btn-success">
            <i class="icon-check2"></i> Save
        </button>
    </div>
</form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Tables end -->












</div> {{-- content-body end --}}

@endsection

@section('script')
@endsection
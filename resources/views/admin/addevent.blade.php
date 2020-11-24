{{-- You can't reply to this conversation. --}}


@extends('layouts.app-admin')

@section('style')

<style type="text/css">
    .is-invalid {
        border-color: red !important;
    }
    .invalid-feedback {
        color: red;
    }
</style>
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Update profile</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">profile
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
                    <h4 class="card-title" id="basic-layout-form">Profile details.</h4>
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
                        
                 
                        {{-- <form class="form" action="{{ route('admin.updateprofile',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Your name</label>
                                            <input type="text" id="projectinput1" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror"  required>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror

                                        
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput3">E-mail</label>
                                            <input type="text" id="projectinput3" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">


                                        <div class="form-group">
                                            <label>Profile photo</label> <br>
                                            <label>Select File</label>
                                            <label id="projectinput7" class="file center-block">
                                            
                                                <input type="file"  name="image">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('image')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>* {{ $message }}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                   
                            
                                <div class="row">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-success" style="width: 20%;">
                                            Update
                                        </button>
                                    
                                    
                                    </div>
                                </div>
                            </div>
                        </form> --}}



                        <form class="form" action="{{route('admin.storeevent')}}" method="POST">
                            <div class="form-body">

                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter title" required value="{{old('title')}}" />
                                        <div class="form-control-position">
                                            <i class="icon-file2"></i>
                                        </div>
                                        @error('title')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="place">Location</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="hidden" id="provId" name="provider_id" >
                                        <input type="text" id="place" class="form-control @error('place') is-invalid @enderror" placeholder="location"  value="{{old('place')}}" name="location" required autocomplete="place" autofocus>
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
                                        <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Describe the event" required>{{old('description')}}</textarea>
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

                            <div class="row">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success" style="width: 20%;">
                                        Submit
                                    </button>
                                
                                
                                </div>
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


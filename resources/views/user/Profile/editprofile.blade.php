{{-- You can't reply to this conversation. --}}


@extends('layouts.app-user')

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

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
    <h2 class="content-header-title">Edit Profile</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Edit Profile
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
                    <h4 class="card-title" id="basic-layout-form">Update Your Profile</h4>
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

                 
                        <form class="form" action="{{ route('updateprofile',['id'=>Auth::id()]) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            
                            <div class="form-body">
                                <h4 class="form-section"><i class="icon-head"></i> Personal Info</h4>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Your Name</label>
                                            <input type="text" id="projectinput1" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"  name="name">

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
                                            <input type="text" id="projectinput3" class="form-control" value="{{$user->email}}" name="email" disabled>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group">
                                                <label class="display-inline-block custom-control custom-radio ml-1">
                                                    <input type="radio" name="gender" class="custom-control-input" @if($user->gender == 1) checked @endif value="1">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description ml-0">Male</span>
                                                </label>
                                                <label class="display-inline-block custom-control custom-radio">
                                                    <input type="radio" name="gender" @if($user->gender == 2) checked @endif class="custom-control-input" value="2">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description ml-0">Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput3">Date of Birth</label>
                                            <input type="date" id="projectinput3" class="form-control @error('d_birth') is-invalid @enderror" value="{{$user->d_birth}}" name="d_birth" >

                                            @error('d_birth')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>* {{ $message }}</strong>
                                           </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="icon-clipboard4"></i>Your Skill</h4>


                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput5">Skill</label>
                                            <select id="projectinput5"  class="form-control selectskill @error('skills') is-invalid @enderror" name="skills[]" multiple="multiple">
                                                @foreach ($skills as $skill)
         
                                                    <option value="{{$skill->id}}" 

                                                    @if($user->hasTag($skill->id)) 
                                                        selected=""
                                                    @endif 
                                                        >{{$skill->name}}</option>

                                               
                                                @endforeach
                                            </select>

                                            @error('skills')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>* {{ $message }}</strong>
                                               </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                            <h4 class="form-section"><i class="icon-clipboard4"></i>Your Photo and Bio</h4>
                            <div class="row">
                                <div class="col-md-8">


                                    <div class="form-group">
                                        <label>Update your profile photo</label> <br>
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
                                    <div class="form-group">
                                        <label for="projectinput8">About Yourself</label>
                                        <textarea id="projectinput8" rows="5" class="form-control @error('description') is-invalid @enderror"  placeholder="About Yourself" name="description">{{$user->description}}</textarea>

                                        @error('description')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>* {{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-check2"></i> Save Changes
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
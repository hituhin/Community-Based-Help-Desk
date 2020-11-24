@extends('layouts.app-login')






@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
    .is-invalid {
        border-color: red !important;
    }
    .invalid-feedback {
        color: red;
    }
    .probll {
        margin-top: 101px !important;
    }
    .form-body {
        margin-top: -32px;
    }
    .box-shadow-2 {
        margin-bottom: 50px;
    }

</style>
@endsection




@section('content')
<section class="probll">
    <div class="col-md-6 offset-md-3 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    {{-- <div class="p-1"><img src="{{ asset('app-assets/images/logo/cbhd.png') }}" alt="branding logo"></div> --}}
                    {{-- <div class="p-1"><h6>User Login</h6></div> --}}
                </div>
                <h4 class="card-subtitle line-on-side text-muted text-xs-center  pt-2"><span>Update your profile</span></h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form" action="{{ route('update-stepconf',['id'=>Auth::id()]) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        
                        <div class="form-body">
                            <h4 class="form-section"><i class="icon-head"></i> Personal Info</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="projectinput1">Your Name</label>
                                        <input type="text" id="projectinput1" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"  name="name" required>

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
                                        <input type="text" id="projectinput3" class="form-control" value="{{$user->email}}" name="email" disabled required>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="input-group">
                                            <label class="display-inline-block custom-control custom-radio ml-1">
                                                <input type="radio" name="gender" class="custom-control-input"   checked >
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
                                        <input type="date" id="projectinput3" class="form-control @error('d_birth') is-invalid @enderror" value="{{$user->d_birth}}" name="d_birth" required>

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
                                        <label for="projectinput5">Skill <br></label>
                                        <select id="projectinput5"  class="form-control selectskill @error('skills') is-invalid @enderror" name="skills[]" multiple="multiple" required>
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
                                    
                                        <input type="file"  name="image" required>
                                        <span class="file-custom"></span>
                                    </label>
                                    @error('image')
                                       <span class="invalid-feedback" role="alert">
                                           <br><strong>* {{ $message }}</strong>
                                       </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="projectinput8">About Yourself</label>
                                    <textarea id="projectinput8" rows="5" class="form-control @error('description') is-invalid @enderror"  placeholder="About Yourself" name="description" required>{{$user->description}}</textarea>

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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.selectskill').select2();
    });

</script>
@endsection
























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
    <h2 class="content-header-title">Edit admin information</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">all admin
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
                    <h4 class="card-title" id="basic-layout-form">Edit admin details.</h4>
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
                        
                 
                        <form class="form" action="{{ route('admin.update',['id'=>$admin->id])}}" method="POST">

                            @csrf
                            
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="projectinput1">Name</label>
                                            <input type="text" id="projectinput1" name="name" value="{{$admin->name}}" class="form-control @error('name') is-invalid @enderror"  required>

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
                                            <input type="text" id="projectinput3" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admin->email}}" required>

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
                                            <label for="projectinput5">Select Role</label>
                                            <select id="projectinput5" name="role" class="form-control {{ $errors->has('role') ? ' has-error' : '' }}">
                                                <option value="0">Select one</option>
                                                <option value="2" @if($admin->role == 2) selected @endif>Admin</option>
                                                <option value="3" @if($admin->role == 3) selected @endif>Editor</option>
                                            </select>
                                            @error('role')
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
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Basic Tables end -->









</div> {{-- content-body end --}}

@endsection


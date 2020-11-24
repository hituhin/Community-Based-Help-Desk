@extends('layouts.app-admin')

@section('content')
<div class="content-header row">
</div>
<div class="content-body">{{-- content-body start --}}



<div class="row">

    <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Welcome to Admin Dashboard</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <div class="media-list media-bordered">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img class="media-object" src="{{Auth::guard('admin')->user()->photo}}" alt="Generic placeholder image" style="width: 64px;height: 64px; border-radius: 50%">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading" style="font-size: 28px">{{Auth::guard('admin')->user()->name}}</h4>
                                        <p  style="font-size: 18px">Email: {{Auth::guard('admin')->user()->email}}</p>
                                        <p style="margin-top: -10px;font-size: 18px;">Role:
                                            @if(Auth::guard('admin')->user()->role == 1) Super Admin
                                            @elseif(Auth::guard('admin')->user()->role == 2)Admin
                                            @else Editor
                                            @endif

                                        </p>

                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
            </div>

</div>


<div class="row">
    <div class="col-xl-4 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">{{$completed_meeting}}</h3>
                            <span style="font-size: 14">Completed Meeting</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">{{$progressing_meeting}}</h3>
                            <span>Progressing Meeting</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-xs-12 " >
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">{{$discussions}}</h3>
                            <span>Forum Posts</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-4 col-lg-12">



            <div class="card" style="">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-cyan media-left media-middle">
                            <i class="icon-news font-large-2 white"></i>
                        </div>
                        <div class="p-2 media-body">
                            <h5>Skills</h5>
                            <h5 class="text-bold-400">{{$skills}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">



                <div class="card" style="">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-blue media-left media-middle">
                                <i class="icon-note font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5>Channels</h5>
                                <h5 class="text-bold-400">{{$channels}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card" style="">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 media-body text-xs-left">
                            <h5>Users</h5>
                            <h5 class="text-bold-400">{{$users}}</h5>
                        </div>
                        <div class="p-2 text-xs-center bg-teal media-right media-middle">
                            <i class="icon-user1 font-large-2 white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>






</div> {{-- content-body end --}}
@endsection


@section('styles')

<style >
    
    .card-body.bg-blue.bg-lighten-4.rounded-top {
        padding: 13px;
    }

</style>

@endsection


@section('script')
    <script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
@endsection
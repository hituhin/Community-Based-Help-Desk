@extends('layouts.app-user')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('extra/css/jquery.countdown.css') }}">
@endsection
@section('content')
<div class="content-header row">
</div>
<div class="content-body">{{-- content-body start --}}



<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">{{$completed_meeting}}</h3>
                            <span style="font-size: 14">Completed Tasks</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="teal">{{$total_connects}}</h3>
                            <span>Total Connects</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">{{$rating}}</h3>
                            <span>Rating</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12 " >
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">{{$total_discussion}}</h3>
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
                            <h5>Meeting Request</h5>
                            <h5 class="text-bold-400">{{$meeting_request}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">



                <div class="card" style="">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-danger media-left media-middle">
                                <i class="icon-megaphone font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5>Waiting for Feedback</h5>
                                <h5 class="text-bold-400">{{$waiting_feedback}}</h5>
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
                            <h5>Connect Request</h5>
                            <h5 class="text-bold-400">{{$connect_request}}</h5>
                        </div>
                        <div class="p-2 text-xs-center bg-teal media-right media-middle">
                            <i class="icon-user1 font-large-2 white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>




<div class="row">

    <div class="col-xl-9 col-lg-12">
            <div class="card" style="">
                <div class="card-header">
                    @if($next_meeting->count() > 0)

                        <h4 class="card-title">Next Meetings</h4>
                    
                    @elseif($prev_meeting->count() > 0)
                        <h4 class="card-title">Previous Meetings</h4>
                    @else
                        <h4 class="card-title">You don't have any meeting to show.</h4>
                    @endif
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        @if($next_meeting->count() > 0)

                            <p>Next Meeting: <span style="font-size: 16px;
    font-weight: 600;"><i class="icon-clock5"></i>Time left: </span> <span style="font-size: 25px" id="getting-started-countdown"></span> </p> 
  {{-- <i class="icon-arrow-right2"></i> --}}
                        
                        @elseif($prev_meeting->count() > 0)
                            <p>Previous Meeting : All meetings are completed. {{-- <i class="icon-arrow-right2"></i></a></span> --}}</p>
                        
                        @endif
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Start at</th>
                                    <th>End at</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            @if($next_meeting->count() > 0)

                                <?php $id = 1 ?>
                                @foreach ($next_meeting as $meeting)
                                    {{-- expr --}}
                                
                                    <tr>
                                        <td class="text-truncate">{{$id}}</td>
                                        <td class="text-truncate">
                                            @if($meeting->seeker_id == Auth::id())
                                                {{$meeting->provider->name}}
                                            @else
                                                {{$meeting->seeker->name}}

                                            @endif

                                        </td>
                                        <td class="text-truncate">{{$meeting->start_time->isoFormat('h:mm a')}}</td>
                                        <td class="text-truncate">{{$meeting->end_time->isoFormat('h:mm a')}}</td>
                                        <td class="text-truncate">{{$meeting->start_time->isoFormat('dddd, Do MMM YYYY')}}</td>
                                    </tr>
                                <?php $id++ ?>
                                @endforeach
                        
                            @elseif($prev_meeting->count() > 0)
                                <?php $id = 1 ?>
                                @foreach ($prev_meeting as $meeting)
                                    {{-- expr --}}
                                
                                    <tr>
                                        <td class="text-truncate">{{$id}}</td>
                                        <td class="text-truncate">
                                            @if($meeting->seeker_id == Auth::id())
                                                {{$meeting->provider->name}}
                                            @else
                                                {{$meeting->seeker->name}}

                                            @endif

                                        </td>
                                        <td class="text-truncate">{{$meeting->start_time->isoFormat('h:mm a')}}</td>
                                        <td class="text-truncate">{{$meeting->end_time->isoFormat('h:mm a')}}</td>
                                        <td class="text-truncate">{{$meeting->start_time->isoFormat('MMM Do YYYY')}}</td>
                                    </tr>
                                <?php $id++ ?>
                                @endforeach
                                
                            @endif
                                

                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>


    <div class="col-xl-3 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body bg-blue bg-lighten-4 rounded-top">


                <a class="weatherwidget-io" href="https://forecast7.com/en/23d8190d41/dhaka/" data-label_1="DHAKA" data-label_2="Bangladesh" data-theme="sky" >DHAKA Bangladesh</a>


                </div>
                <div class="card-footer p-0 border-0">
                    {{-- <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="details-left float-left">
                                            <span class="font-small-1 grey text-bold-600 block">WIND</span>
                                            <span class="text-bold-500">&lt;12MPH</span>
                                        </div>
                                        <div class="float-right align-middle">
                                            <i class="me-wind blue lighten-1 font-large-1"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="details-left float-left">
                                            <span class="font-small-1 grey text-bold-600 block">REAL FEEL</span>
                                            <span class="text-bold-500">31.5°</span>
                                        </div>
                                        <div class="float-right align-middle">
                                            <i class="me-thermometer blue lighten-1 font-large-1"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="details-left float-left">
                                            <span class="font-small-1 grey text-bold-600 block">UV INDEX</span>
                                            <span class="text-bold-500">5%</span>
                                        </div>
                                        <div class="float-right align-middle">
                                            <i class="me-sun blue lighten-1 font-large-1"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="details-left float-left">
                                            <span class="font-small-1 grey text-bold-600 block">PRESSURE</span>
                                            <span class="text-bold-500">30.19 in</span>
                                        </div>
                                        <div class="float-right align-middle">
                                            <i class="me-compass blue lighten-1 font-large-1"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div> {{-- col-xl-4 col-md-12 col-sm-12 --}}



    {{-- <div class="col-xl-4 col-lg-12">
        <div class="card card-inverse bg-info">
            <div class="card-body">
                <div class="position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2 white">
                        <h1 class="display-4">34</h1>
                        <span>Dhaka, Bangladesh</span>
                    </div>
                    <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                    <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                        <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for the Month.
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>

    <script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');

    @if($just_next)
        
          $("#getting-started-countdown")
          .countdown("{{$just_next->start_time}}", function(event) {
            $(this).text(
              event.strftime('%D days %H:%M:%S')
            );
          });
    @endif

    </script>
@endsection
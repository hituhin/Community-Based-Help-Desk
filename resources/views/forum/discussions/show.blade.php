
@extends('layouts.app-user')

@section('content')


        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Forum</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Forum
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Search form-->
<section id="search-website" class="card overflow-hidden">
    <div class="card-header">
        <h4 class="card-title">Forum</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
    

    <div class="card-block">


       
       
            <div class="col-lg-3 ">

                <a href="#replylink" class="form-control btn btn-info">Leave a reply</a>
            </div>
              

            <div class="col-lg-5 ">
                    
            
                <form id="search-form" action="{{ route('forum') }}" method="GET">
                    
                
                    

                        <div class="input-group">
                            <input type="text" class="form-control  " placeholder="search here"  name="s" value="{{ request()->query('s') }}">

                            <span class="input-group-addon btn btn-success rounded rounded-right"  onclick="event.preventDefault();
                                                             document.getElementById('search-form').submit()"><i class="icon-android-search font-medium-4"></i>{{-- <input type="submit" name=""> --}}</span>
                        </div>
                </form>

            </div>




            <div class="col-lg-4 ">
                    <select class="form-control selectSkill border-success" style="font-size 40px !important;" id="won">
                        <option value="selectC">Select a channel</option>

                        @foreach($channels as $channel)
                            <option value="{{$channel->slug}}">
                                {{ $channel->title }}
                            </option>
                        @endforeach
                     
                    </select>
                                               
            </div>

</div>

    <div class="card-block">



       
        <div class="col-lg-3">
            


            <div class="list-group" id="forumlist">
                <a href="{{ route('forum') }}?ss=1" class="list-group-item list-group-item-action @if(request()->query('ss') ==1) active @endif">
                    <i class="icon-android-document"></i>
                All Threads</a>

                <a href="{{ route('forum') }}?ss=2" class="list-group-item list-group-item-action @if(request()->query('ss') ==2) active @endif">
                <span class="icon-help-circled"></span>
                Your Threads</a>

                <a href="{{ route('forum') }}?ss=3" class="list-group-item list-group-item-action @if(request()->query('ss') ==3) active @endif">
                <span class="icon-android-sunny"></span>
                You are following</a>


                <a href="{{ route('forum') }}?ss=4" class="list-group-item list-group-item-action @if(request()->query('ss') ==4) active @endif">
                <span class="icon-star "></span>
                Popular this week</a>

                <a href="{{ route('forum') }}?ss=5" class="list-group-item list-group-item-action @if(request()->query('ss') ==5) active @endif">
                <span class="icon-star"></span>

                Popular all time</a>

                <a href="{{ route('forum') }}?ss=6" class="list-group-item list-group-item-action @if(request()->query('ss') ==6) active @endif">
                <span class="icon-android-checkbox"></span>
                Solved</a>

                <a href="{{ route('forum') }}?ss=7" class="list-group-item list-group-item-action @if(request()->query('ss') ==7) active @endif">
                <span class="icon-android-cancel"></span>
                {{-- <span class="tag tag-success tag-pill float-xs-right">2</span> --}}
                Unsolved</a>

            </div>
        </div>


            <div class="col-lg-9">
                






    <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="{{$d->user->image}}" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style=" display: inline-block; text-align: left;     margin-right: 6px;" class="float-xl-left float-md-left">

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c;">{{ $d->user->name }}</a></h5>
                        @if($best_answer)
                            <button class="btn btn-success btn-sm">Solved</button>
                        @else
                            <button class="btn btn-outline-success btn-sm">Not solved</button>
                        @endif
    

                        @if($d->is_being_watched_by_auth_user())
                            <a href="{{ route('discussion.unwatch', ['id' => $d->id ]) }}" class="float-xl-right float-md-right btn btn-outline-info btn-sm" >Unwatch</a>
                        @else
                            <a href="{{ route('discussion.watch', ['id' => $d->id ]) }}" class="float-xl-right float-md-right btn btn-outline-info btn-sm" >Watch</a>
                        @endif
                    </div>
                </div>
                    

                    <ul class="list-inline list-inline-pipe text-muted mb-0">
                        <li>
                            Posted: <i class="icon-clock5"></i> {{ $d->created_at->diffForHumans() }}
                        </li>

                        <li> <i class="icon-eye6"></i>  {{ $d->hits }}</li>

                        <li> <i class="icon-speech-bubble"></i> {{ $d->replies->count() }} </li>
                        <li> <span>Channel:</span> <a href="{{ route('channel', ['slug' => $d->channel->slug ]) }}" class=" btn btn-secondary btn-sm" style="padding: 1px 5px; margin-bottom: 3px;">{{ $d->channel->title }}</a> </li>

                             
                    </ul>

                   

                    
                </div>
            </div>
                <hr style="margin-bottom: 25px">

                <p style=" font-size: 15px; background-color: #ECF4FC; padding: 8px;border-radius: 5px; font-weight: 600;" class="">{{ $d->title }}</p>

                <p style=" font-size: 15px;  padding: 8px;" class="">{{ $d->content }}</p>
                
                 
        </div>
    </div>




@if($best_answer)
        <div class="card">
        
            <div class="card-block">


                <div class="media">
                    <a class="media-left" href="#">
                        <img class="media-object rounded-circle" src="{{$best_answer->user->image}}" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                    </a>
                    <div class="media-body">
                        
                    <div class="row">
                        <div class="col-xs-12">
                            <h5 style=" display: inline-block; text-align: left;     margin-right: 6px;" class="float-xl-left float-md-left">

                            <a href="" class="media-heading " style="font-size: 22px; color: #373a3c;">{{ $best_answer->user->name }}</a></h5>

                            <button class="btn btn-success btn-sm">BEST ANSWER</button>

        
                            <div class="float-xl-right float-md-right">

                            @if($best_answer->is_liked_by_auth_user())
                              <a href="{{ route('reply.unlike', ['id' => $best_answer->id ]) }}" class="  btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $best_answer->likes->count() }}</a>
                            @else
                              <a href="{{ route('reply.like', ['id' => $best_answer->id ]) }}" class="  btn btn-outline-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $best_answer->likes->count() }}</a>
                            @endif

                              {{-- <a href="" class=" btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-down"></i> 256</a> --}}
                            </div>
                        </div>
                    </div>
                        

                        

                        <ul class="list-inline list-inline-pipe text-muted mb-0">
                            <li>
                                Replied: <i class="icon-clock5"></i> {{ $best_answer->created_at->diffForHumans() }}
                            </li>

                                 
                        </ul>

                       

                        
                    </div>
                </div>
                    <hr >

                    <p style=" font-size: 15px;  padding: 8px;" class="">{{ $best_answer->content }}</p>
                    
                     
            </div>
        </div>

    @endif

@foreach($d->replies as $r)
    <?php if(isset($best_answer->id)) { ?>
        @if($r->id != $best_answer->id)

        <div class="card">
        
            <div class="card-block">


                <div class="media">
                    <a class="media-left" href="#">
                        <img class="media-object rounded-circle" src="{{$r->user->image}}" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                    </a>
                    <div class="media-body">
                        
                    <div class="row">
                        <div class="col-xs-12">
                            <h5 style=" display: inline-block; text-align: left;     margin-right: 6px;" class="float-xl-left float-md-left">

                            <a href="" class="media-heading " style="font-size: 22px; color: #373a3c;">{{ $r->user->name }}</a></h5>
                            
                            @if(!$best_answer)
                                @if(Auth::id() == $d->user->id)
                                    <a href="{{ route('discussion.best.answer', ['id' => $r->id ]) }}" class="btn btn-outline-success btn-sm">Mark as best answer</a>
                                @endif
                            @endif
                   
        
                            <div class="float-xl-right float-md-right">

                            @if($r->is_liked_by_auth_user())
                              <a href="{{ route('reply.unlike', ['id' => $r->id ]) }}" class="  btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $r->likes->count() }}</a>
                            @else
                              <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="  btn btn-outline-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $r->likes->count() }}</a>
                            @endif

                              {{-- <a href="" class=" btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-down"></i> 256</a> --}}
                            </div>
                        </div>
                    </div>
                        

                        

                        <ul class="list-inline list-inline-pipe text-muted mb-0">
                            <li>
                                Replied: <i class="icon-clock5"></i> {{ $r->created_at->diffForHumans() }}
                            </li>

                                 
                        </ul>

                       

                        
                    </div>
                </div>
                    <hr >

                    <p style=" font-size: 15px;  padding: 8px;" class="">{{ $r->content }}</p>
                    
                     
            </div>
        </div>

        @endif

    <?php }else{ ?>

    <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="{{$r->user->image}}" alt=" image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style=" display: inline-block; text-align: left;     margin-right: 6px;" class="float-xl-left float-md-left">

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c;">{{ $r->user->name }}</a></h5>
                        
                        @if(!$best_answer)
                            @if(Auth::id() == $d->user->id)
                                <a href="{{ route('discussion.best.answer', ['id' => $r->id ]) }}" class="btn btn-outline-success btn-sm">Mark as best answer</a>
                            @endif
                        @endif
               
    
                        <div class="float-xl-right float-md-right">

                        @if($r->is_liked_by_auth_user())
                          <a href="{{ route('reply.unlike', ['id' => $r->id ]) }}" class="  btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $r->likes->count() }}</a>
                        @else
                          <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="  btn btn-outline-info btn-sm" style="   "><i class="icon-thumbs-o-up"></i> {{ $r->likes->count() }}</a>
                        @endif

                          {{-- <a href="" class=" btn btn-info btn-sm" style="   "><i class="icon-thumbs-o-down"></i> 256</a> --}}
                        </div>
                    </div>
                </div>
                    

                    

                    <ul class="list-inline list-inline-pipe text-muted mb-0">
                        <li>
                            Replied: <i class="icon-clock5"></i> {{ $r->created_at->diffForHumans() }}
                        </li>

                             
                    </ul>

                   

                    
                </div>
            </div>
                <hr >

                <p style=" font-size: 15px;  padding: 8px;" class="">{{ $r->content }}</p>
                
                 
        </div>
    </div>
    

    <?php } ?>
        


@endforeach

    {{-- Reply form --}}

@if(Auth::check())
      <div class="card" id="replylink">
    
        <div class="card-block">


            <div class="media">
                <h5>Leave a reply...</h5>

            </div>
                <hr >

                <form class="form" action="{{ route('discussion.reply', ['id' => $d->id ]) }}" method="post">
                    <div class="form-body">

    
                        {{ csrf_field() }}

                      <div class="form-group">
                        <textarea rows="5" class="form-control" name="reply" placeholder="Your Reply" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Write your reply here" data-original-title="" title="">{{old('reply')}}</textarea>
                      </div>

                    </div>

                    <div class="">
                     
                      <button type="submit" class="btn btn-success">
                        Leave a reply
                      </button>
                    </div>
                  </form>
                
                 
        </div>
    </div>
@else
  <p class="alert alert-info">Sign in to leave a reply.</p>
@endif












 {{--  <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-4.png" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-10">
                        <h5>

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c">Masud Rana </a>





                    </h5>

                    </div>
                    <div class="col-xs-2">
                        <a href="" class=" btn btn-outline-info btn-sm" style="    font-size: 16px; padding: 2px 14px; border-radius: 5px;">View</a>
                    </div>
                </div>
                    

                    

                    <ul class="list-inline list-inline-pipe text-muted mb-0">
                        <li>
                            Posted: <i class="icon-clock5"></i> 2 minutes ago
                        </li>

                        <li> <i class="icon-eye6"></i>  24</li>

                        <li>
                            <i class="icon-speech-bubble"></i> 255 </li>

                             
                    </ul>

                   

                    
                </div>
            </div>
                <hr style="margin-bottom: 25px">

                <p style=" font-size: 15px;">Chocolate bar apple pie lollipop pastry candy canes. Candy soufflé brownie toffee tootsie roll. Brownie lemon drops chocolate cake donut croissant cotton candy ice cream. </p>
                <hr style="margin-top: 25px">

                
                        <span>Channel: </span> <a href="" class=" btn btn-secondary btn-sm" >Laravel</a>
                 
        </div>
    </div>
 --}}












            

                </div> {{-- col-lg-9 --}}
                      

{{-- 
                <div class="text-xs-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">« Prev</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">Next »</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
            </div>

        </div>
    </div>
</section>
<!--/ Search form -->

        </div>
      </div>



@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script >
        
$(document).ready(function() {


    $(document).on('change','#won',function(){
        var channel = $(this).val();

        if(channel != 'selectC')
        // alert(channel)
            window.location.replace('http://cbhd.mr/channel/'+channel)
          });
});
</script>


@endsection
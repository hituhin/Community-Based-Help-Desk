
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
        @if(request()->query('s'))
            <h4 class="card-title">Discussion for " {{request()->query('s')}} "</h4>
        @elseif(request()->query('ss') == 1)
            <h4 class="card-title">All Threads</h4>
        @elseif(request()->query('ss') == 2)
            <h4 class="card-title">Your Threads</h4>
        @elseif(request()->query('ss') == 3)
            <h4 class="card-title">You are following</h4>
        @elseif(request()->query('ss') == 4)
            <h4 class="card-title">Popular this week</h4>
        @elseif(request()->query('ss') == 5)
            <h4 class="card-title">Popular all time</h4>
        @elseif(request()->query('ss') == 6)
            <h4 class="card-title">Solved</h4>
        @elseif(request()->query('ss') == 7)
            <h4 class="card-title">Unsolved</h4>
        @elseif(request()->query('ss') == 8)
            <h4 class="card-title">No Replies Yet</h4>
        @else
            <h4 class="card-title">Forum</h4>
        @endif
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

                <a data-toggle="modal" data-target="#showDetails"  class="form-control btn btn-info text-white">Create a new discussion</a>

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
                




@foreach($discussions as $d)


    <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="{{$d->user->image}}" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style=" display: inline-block; text-align: left;" class="float-xl-left float-md-left">

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c">{{ $d->user->name }}</a>





                    </h5>

    
                        <a href="{{ route('discussion', ['slug' => $d->slug ]) }}" class="float-xl-right float-md-right btn btn-outline-info btn-sm" style="    font-size: 16px; padding: 2px 14px; border-radius: 5px;">View</a>
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
                <p style=" font-size: 15px;  padding: 2px 8px;border-radius: 5px; ">
                    {{ str_limit($d->content, 90) }}
                </p>
                
                 
        </div>
    </div>

@endforeach

@if ($discussions->count() == 0)
     <h4 class="alert alert-danger " style="color: #fff !important;">No discussion found. Please try again.</h4>
@endif 

<div class="text-center">
    @if(request()->query('s'))
        {{ $discussions->appends(['s' => request()->query('s') ])->links() }}
    @elseif((request()->query('ss')))
        {{ $discussions->appends(['ss' => request()->query('ss') ])->links() }}
    @else
        {{ $discussions->links() }}
    @endif
</div>











            

                </div> {{-- col-lg-9 --}}
                      


{{--                 <div class="text-xs-center">
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
<!--/ -->


<div class="modal fade" id="showDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel1">Create a new discussion</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('discussions.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                      <label for="channel"> Pick a channel</label>
                      <select name="channel_id" id="channel_id" class="form-control">
                            @foreach($channels as $channel)
                                  <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                            @endforeach
                      </select>
                </div>
                <div class="form-group">
                      <label for="content">Ask a question</label>
                      <textarea name="content" id="content" cols="20" rows="7" class="form-control"></textarea>
                </div>
                <div class="form-group">
                      <button class="btn btn-success pull-right" type="submit">Create discussion</button>
                </div>
            </form> 
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



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
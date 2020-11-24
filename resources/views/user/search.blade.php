
@extends('layouts.app-user')

@section('content')


        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Search Profile</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Search Profile
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Search form-->
<section id="search-website" class="card overflow-hidden">
    <div class="card-header">

@if(request()->query('q'))

        <h4 class="card-title">Search results for {{ request()->query('q') }}</h4>
@else
        <h4 class="card-title">Search results </h4>
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
        <div class="card-block pb-0">
            <form id="search-form" action="/search" method="GET">
                
            
            <fieldset class="form-group position-relative mb-0">

                <div class="input-group">
                    <input type="text" class="form-control  input-lg" placeholder="type name or email"  name="q" value="{{ request()->query('q') }}">

                    <span class="input-group-addon btn btn-success rounded rounded-right" style="padding: 10px; border-radius: 2px;" onclick="event.preventDefault();
                                                     document.getElementById('search-form').submit()"><i class="icon-android-search font-medium-4"></i>{{-- <input type="submit" name=""> --}}</span>
                </div>


                {{-- <input type="text" class="form-control form-control-lg input-lg" id="iconLeft" placeholder="skill, name, email">
                <div class="form-control-position">
                    <i class="icon-android-search font-medium-4"></i><input type="submit" name="">
                </div> --}}
            </fieldset>
            </form>
        </div>
        <!--Search Navbar-->
        <div id="search-nav" class="card-block">
            <ul class="nav nav-inline">
                <span class="mr-1"> Category/Skill :</span>

@if(request()->query('q') || request()->query('s'))

                <li class="nav-item " style="margin: 0px 2px 3px 0px;"><a href="{{ route('search.profile') }}" class="btn btn-outline-info  btn-sm rounded ">All</a>
@else
                <li class="nav-item " style="margin: 0px 2px 3px 0px;"><a href="{{ route('search.profile') }}" class="btn btn-outline-info  btn-sm rounded active ">All</a>
                </li>
@endif
                   
                  @foreach ($skills as $skill)
                                    {{-- expr --}}
                <li class="nav-item" style="margin: 0px 2px 3px 0px;"><a href="search/?s={{$skill->id}}" class="btn btn-outline-info  btn-sm rounded @if(request()->query('s') == $skill->id) active  @endif">{{ $skill->name }}</a>
                               
                </li>
                                @endforeach              
                    

                    {{-- <a class="nav-link active" href="search-website.html"><i class="icon-bonfire"></i> Website</a> --}}
               
                <li class="dropdown nav-item float-xs-right">
                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-setting1"></i> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="#" class="dropdown-link">Search Help</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/ Search Navbar-->
        <!--Search Result-->
        <div id="search-results" class="card-block">
            <div class="col-lg-8">
                @if (($users->count() > 0))
                    <p class="text-muted font-small-3">About {{$users->count()}} profile(s) </p>
                @else
                    <h4 class="text-center text-danger" style="text-align: center;">Not found @if(request()->query('q')) for "{{request()->query('q')}}" @endif . Please try again!</h4>
                @endif
                <hr>

    
        <div class="media-list media-bordered">
            
        @foreach ($users as $user)
                {{-- expr --}}
            
            <div class="media">
                <a class="media-left" href="{{ route('vi.profile',['id'=> $user->id]) }}">
                    <img class="media-object" src="{{$user->image}}" alt="Generic placeholder image" style="width: 84px;height: 84px; border-radius: 50%;">
                </a>
                <div class="media-body">
                    <h5>

                        <a href="{{ route('vi.profile',['id'=> $user->id]) }}" class="media-heading " style="font-size: 22px; color: #373a3c">{{$user->name}} </a>
                        
                        
                        
       
                        
                        @if( $user->hasConnect( Auth::id(), $user->id) == "can")
                        <span > <a href="{{ route('connect.req',['id'=>$user->id]) }}" class="btn btn-outline-success btn-sm ml-1"><i class="icon-android-person-add "></i> Send Request</a></span>
                        
                        @endif

                        {{-- {{$user->hasConnect( Auth::id(), $user->id)}} --}}

                        @if( $user->hasConnect( Auth::id(), $user->id) == "accept")
                        <span ><a href="{{ route('connect.acc',['id'=>$user->id]) }}" class="btn btn-outline-success btn-sm ml-1"><i class="icon-android-cancel "></i> Accept Request</a></span>
                        <span ><a href="{{ route('connect.rej',['id'=>$user->id]) }}" class="btn btn-outline-danger btn-sm ml-1"><i class="icon-android-cancel "></i> Reject Request</a></span>
                        @endif

                        
                        
                        @if( $user->hasConnect( Auth::id(), $user->id) == "cancel")
                        <span ><a href="{{ route('connect.canc',['id'=>$user->id]) }}" class="btn btn-outline-danger btn-sm ml-1"><i class="icon-android-cancel "></i> Cancel Request</a></span>
                        @endif


                        @if( $user->hasConnect( Auth::id(), $user->id) == "connected")
                        <span ><a class="btn btn-success btn-sm ml-1 white"><i class="icon-android-contacts white"></i> Connected</a></span>

                        @endif


                    </h5>

                    <ul class="list-inline list-inline-pipe text-muted">
                                
                                @if($user->rating() == 5)
                                    <li>
                    
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        &nbsp;{{$user->rating()}} stars
                                    </li>

                                @elseif($user->rating() == 4.5)
                                    <li>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star-half yellow darken-2"></i>
                                        &nbsp;{{$user->rating()}} stars
                                    </li>
                                @elseif($user->rating() == 4)
                                    <li>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star yellow darken-2"></i>
                                        <i class="icon-android-star-outline yellow darken-2"></i>
                                         
                                         &nbsp;{{$user->rating()}} stars
                                    </li>
                                @else
                                    <li>
                                        New User
                                    </li>
                                @endif

                                
                                <li>
                                    <i class="icon-android-contacts black " style="font-size: 15px;"></i>                                    
                                    {{$user->total_connected($user->id)}} connects
                                </li>
                                <li>
                                    <i class="icon-android-clipboard black " style="font-size: 15px;"></i>
                                {{$user->total_completed($user->id)}} completed</li>
                    </ul>



                    {{$user->description}} <br>

                    <h5 class="media-heading mt-1">Skill(s) : </h5>
                    <ul class="list-inline text-muted">

                        @foreach ($user->skills as $skill)
                            
                            <li class="" style="margin: 0px 2px 3px 0px;"><a href="search/?s={{$skill->id}}" class="btn btn-outline-secondary  btn-sm rounded- ">{{$skill->name}}</a></li>
                        @endforeach
                                
                               
                    </ul>
                    
                </div>
            </div>

        @endforeach

        {{--     <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object" src="../../app-assets/images/portrait/small/avatar-s-4.png" alt="Generic placeholder image" style="width: 84px;height: 84px;">
                </a>
                <div class="media-body">
                    <h5>

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c">Masud Rana </a>
                        <span ><a class="btn btn-outline-success btn-sm ml-1"><i class="icon-android-person-add "></i> Send Request</a></span>

                        <span ><a class="btn btn-outline-danger btn-sm ml-1"><i class="icon-android-cancel "></i> Cancel Request</a></span>

                        <span ><a class="btn btn-success btn-sm ml-1 white"><i class="icon-android-contacts white"></i> Connected</a></span>


                    </h5>

                    <ul class="list-inline list-inline-pipe text-muted">
                                <li>
                                    <i class="icon-android-star yellow darken-2"></i>
                                    <i class="icon-android-star yellow darken-2"></i>
                                    <i class="icon-android-star yellow darken-2"></i>
                                    <i class="icon-android-star yellow darken-2"></i>
                                    <i class="icon-android-star-half yellow darken-2"></i> &nbsp;4.5 stars
                                </li>
                                <li>
                                    <i class="icon-android-contacts black " style="font-size: 15px;"></i>                                    
                                    50 connects
                                </li>
                                <li>
                                    <i class="icon-android-clipboard black " style="font-size: 15px;"></i>
                                50 completed</li>
                    </ul>



                    Chocolate bar apple pie lollipop pastry candy canes. Candy soufflé brownie toffee tootsie roll. Brownie lemon drops chocolate cake donut croissant cotton candy ice cream. <br>

                    <h5 class="media-heading mt-1">Skill(s) : </h5>
                    <ul class="list-inline text-muted">

                        @for($i=0; $i<=20; $i++)
                                
                                <li class="" style="margin: 0px 2px 3px 0px;"><a href="#" class="btn btn-outline-secondary  btn-sm rounded- ">JavaScript</a></li>
                               
                        @endfor

                               
                    </ul>
                    
                </div>
            </div> --}}


            

        </div>
                      


                 <div class="text-xs-center">
{{--                    <nav aria-label="Page navigation">
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
--}}

    {{-- {{ $users->links() }}  --}}

                </div> 
            </div>
            <div class="col-lg-4">
                <div class="card border-grey border-lighten-2">
   
                    <div class="card-block">
                        <p class="text-bold-600" style="font-size: 17px;">People also search for</p>
                        <div class="row">

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                        @foreach ($skills as $skill)
                                            <tr>
                                                <td>
                                        <a href="search/?s={{$skill->id}}" class=" black " style="display: block;">
                                                    {{$skill->name}}

                                        </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                            
                        
                  
                        </div>
                    </div>
                </div>













               {{--  <div class="card border-grey border-lighten-2">
   
                    <div class="card-block">
                        <p class="text-bold-600">Top rated profile</p>
                        <div class="row">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img class="media-object" src="/img/user.png" alt="image" style="width: 84px;height: 84px;">
                                </a>
                                <div class="media-body">
                                    <h5>

                                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c; display: inline-block; margin-bottom: 5px;">Md. Saju Ahmed </a>
                                        <span class="mt-lg-1 mt-md-1" ><a class="btn btn-outline-success btn-sm"><i class="icon-android-person-add "></i> Send Request</a></span>



                                    </h5>

                                    <ul class="list-inline list-inline-pipe text-muted">
                                                <li>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i> &nbsp;5 stars
                                                </li>
                                    </ul>
                                    
                                </div>
                            </div>

                            <hr>
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img class="media-object" src="/img/user.png" alt="image" style="width: 84px;height: 84px;">
                                </a>
                                <div class="media-body">
                                    <h5>

                                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c; display: inline-block; margin-bottom: 5px;">Md. Raju Ahmed</a>
                                        <span class="mt-lg-1 mt-md-1" ><a class="btn btn-outline-success btn-sm"><i class="icon-android-person-add "></i> Send Request</a></span>



                                    </h5>

                                    <ul class="list-inline list-inline-pipe text-muted">
                                                <li>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star yellow darken-2"></i>
                                                    <i class="icon-android-star-half yellow darken-2"></i> &nbsp;4.9 stars
                                                </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}









            </div>
        </div>
    </div>
</section>
<!--/ Search form -->

        </div>
      </div>





{{-- <div class="col-xl-4 col-md-6 col-12">
        <div class="card profile-card-with-stats border-teal border-lighten-2">
            <div class="text-center">
                <div class="card-body">
                    <img src="../../../app-assets/images/portrait/medium/avatar-m-7.png" class="rounded-circle  height-150" alt="Card image">
                </div>
                <div class="card-body">
                    <h4 class="card-title">Philip Garrett</h4>
                    <ul class="list-inline list-inline-pipe">
                        <li>@philipg</li>
                        <li>domain.com</li>
                    </ul>
                    <h6 class="card-subtitle text-muted">Managing Director</h6>
                </div>
                <div class="btn-group" role="group" aria-label="Profile example">
                    <button type="button" class="btn btn-float box-shadow-0 btn-outline-info btn-round"><span class="ladda-label"><i class="fa fa-bell-o"></i><span>12+</span></span><span class="ladda-spinner"></span></button>
                    <button type="button" class="btn btn-float box-shadow-0 btn-outline-info btn-round"><span class="ladda-label"><i class="fa fa-heart-o"></i><span>25</span></span><span class="ladda-spinner"></span></button>
                    <button type="button" class="btn btn-float box-shadow-0 btn-outline-info btn-round"><span class="ladda-label"><i class="fa fa-briefcase"></i><span>5</span></span><span class="ladda-spinner"></span></button>
                    <button type="button" class="btn btn-float box-shadow-0 btn-outline-info btn-round"><span class="ladda-label"><i class="ft-mail"></i><span>75+</span></span><span class="ladda-spinner"></span></button>
                    <button type="button" class="btn btn-float box-shadow-0 btn-outline-info btn-round"><span class="ladda-label"><i class="fa fa-dashcube"></i><span>125</span></span><span class="ladda-spinner"></span></button>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, autem imperdiet et nam. Nullam labores id quo, sed ei.</p>
                    <button type="button" class="btn btn-outline-danger btn-md btn-round mr-1"><i class="fa fa-plus"></i> Follow</button>
                    <button type="button" class="btn btn-outline-primary btn-md btn-round mr-1"><i class="ft-user"></i> Profile</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

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

                <a href="" class="form-control btn btn-info">Create a new discussion</a>
            </div>
              

            <div class="col-lg-5 ">
                    
            
                <form id="" action="/search" method="GET">
                    
                
                    

                        <div class="input-group">
                            <input type="text" class="form-control  " placeholder="skill, name, email"  name="q" value="{{ request()->query('q') }}">

                            <span class="input-group-addon btn btn-success rounded rounded-right"  onclick="event.preventDefault();
                                                             document.getElementById('search-form').submit()"><i class="icon-android-search font-medium-4"></i>{{-- <input type="submit" name=""> --}}</span>
                        </div>
                </form>

            </div>




            <div class="col-lg-4 ">
                    <select class="form-control selectSkill border-success" style="font-size 40px !important;" id="seleckSk">
                        <option><a href="#">Select a channel</a></option>
                        @foreach ($skills as $skill)
                            {{-- expr --}}
                            <option>{{$skill->name}}</option>
                        @endforeach
                     
                    </select>
                                               
            </div>

</div>

    <div class="card-block">



       
        <div class="col-lg-3">
            


            <div class="list-group">

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-android-document"></i>
                <span class="tag tag-primary tag-pill float-xs-right">5</span>
                All Threads</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-help-circled"></span>
                <span class="tag tag-success tag-pill float-xs-right">2</span>
                Your Threads</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-android-sunny"></span>
                <span class="tag tag-success tag-pill float-xs-right">2</span>
                You are following</a>


                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-star"></span>
                <span class="tag tag-danger tag-pill float-xs-right">1</span>Popular This Week</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-star"></span>
                <span class="tag tag-danger tag-pill float-xs-right">1</span>Popular All Time</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-android-checkbox"></span>
                <span class="tag tag-primary tag-pill float-xs-right">5</span>
                Solved</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-android-cancel"></span>
                <span class="tag tag-success tag-pill float-xs-right">2</span>
                Unsolved</a>

                <a src="#" class="list-group-item list-group-item-action">
                <span class="icon-android-open"></span>
                <span class="tag tag-danger tag-pill float-xs-right">1</span>No Replies Yet</a>

            </div>
        </div>


            <div class="col-lg-9">
                






    <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="/img/user.png" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style=" display: inline-block; text-align: left;" class="float-xl-left float-md-left">

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c">Masud Rana </a>





                    </h5>

    
                        <a href="/discuss/sigle/1" class="float-xl-right float-md-right btn btn-outline-info btn-sm" style="    font-size: 16px; padding: 2px 14px; border-radius: 5px;">View</a>
                    </div>
                </div>
                    

                    

                    <ul class="list-inline list-inline-pipe text-muted mb-0">
                        <li>
                            Posted: <i class="icon-clock5"></i> 10 hours ago
                        </li>

                        <li> <i class="icon-eye6"></i>  24</li>

                        <li> <i class="icon-speech-bubble"></i> 1 </li>
                        <li> <span>Channel:</span> <a class=" btn btn-secondary btn-sm" style="padding: 1px 5px; margin-bottom: 3px;">Web Development </a> </li>

                             
                    </ul>

                   

                    
                </div>
            </div>
                <hr style="margin-bottom: 25px">

                <p style=" font-size: 15px; background-color: #ECF4FC; padding: 8px;border-radius: 5px; font-weight: 600;" class="">Flysystem getSize doesn't work on directory in Javascript</p>
                
                 
        </div>
    </div>

    <div class="card">
    
        <div class="card-block">


            <div class="media">
                <a class="media-left" href="#">
                    <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-4.png" alt="Generic placeholder image" style="width: 60px;height: 60px;">
                </a>
                <div class="media-body">
                    
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style=" display: inline-block; text-align: left;" class="float-xl-left float-md-left">

                        <a href="" class="media-heading " style="font-size: 22px; color: #373a3c">Rakib </a>





                    </h5>

    
                        <a href="" class="float-xl-right float-md-right btn btn-outline-info btn-sm" style="    font-size: 16px; padding: 2px 14px; border-radius: 5px;">View</a>
                    </div>
                </div>
                    

                    

                    <ul class="list-inline list-inline-pipe text-muted mb-0">
                        <li>
                            Posted: <i class="icon-clock5"></i> 12 hours ago
                        </li>

                        <li> <i class="icon-eye6"></i>  12</li>

                        <li> <i class="icon-speech-bubble"></i> 1</li>
                        <li> <span>Channel:</span> <a class=" btn btn-secondary btn-sm" style="padding: 1px 5px; margin-bottom: 3px;">Laravel</a> </li>

                             
                    </ul>

                   

                    
                </div>
            </div>
                <hr style="margin-bottom: 25px">

                <p style=" font-size: 15px; background-color: #ECF4FC; padding: 8px;border-radius: 5px; font-weight: 600;" class="">laravel 5.8 migration issue</p>
                
                 
        </div>
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


    // $('.selectSkill').select2();
});
</script>


@endsection
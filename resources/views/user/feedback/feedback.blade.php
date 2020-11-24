
@extends('layouts.app-user')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

 <style>
    #newColDetails{
        margin-bottom: 0;
      }

    #newColDetails th, #newColDetails td {
        padding: 11px 17px;
      }

   #newColDetails tr td:nth-child(1) {
        width: 33%;
    }
 </style>
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">All completed Meeting feedback</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">feedback
        </li>
      </ol>
    </div>
  </div>
</div>


<div class="content-body">{{-- content-body start --}}



<!-- Basic Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meeting Feedback</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        {{-- <li><a data-action="reload"><i class="icon-reload"></i></a></li> --}}
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <p class="card-text">You can give feedback by clicking the button</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    


                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>


                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th class="no-sort">Profile</th>
                                    <th class="no-sort">Details</th>
                                    <th class="no-sort">Feedback details</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                                <?php $id=1 ?>
@foreach ($getevents as $event)

      <tr>
          <th scope="row">{{$id}}</th>                
          @if($event->seeker->id != Auth::id())
            <td>{{ $event->seeker->name }}</td>
            <td><a href="{{ route('vi.profile',['id'=> $event->seeker->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
            <td><a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->seeker->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}" data-user="provider">View Details</a>
            </td>
            <td>
              @foreach ($event->feedback as $feedback)

                @if ($feedback->receiver_id == Auth::id()) {{-- provider --}}
                  <a class="btn btn-info btn-sm showfd text-white" href="javascript:void(0)" data-rev="{{$feedback->review}}" data-ra="{{$feedback->rating}}" data-activity="receive">Your Feedback</a> 
                @endif

                @if ($feedback->receiver_id != Auth::id())
                  <a class="btn btn-info btn-sm showfd text-white" href="javascript:void(0)" data-rev="{{$feedback->review}}" data-ra="{{$feedback->rating}}" data-activity="give">Seeker Feedback</a>
                @endif
                
                
              @endforeach

            </td>
            <?php $id++ ?>

          @else

            <td>{{ $event->provider->name }}</td>
            <td><a href="{{ route('vi.profile',['id'=> $event->provider->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
            <td>
              <a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->provider->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}" data-user="seeker">View Details</a>
            </td>
            <td>
                @foreach ($event->feedback as $feedback)
                  
                  @if ($feedback->receiver_id != Auth::id())
                    <a class="btn btn-info btn-sm showfd text-white"  href="javascript:void(0)" data-rev="{{$feedback->review}}" data-ra="{{$feedback->rating}}" data-activity="give">Provider Feedback</a>
                  @endif

                  @if ($feedback->receiver_id == Auth::id()) {{-- seeker --}}
                    <a class="btn btn-info btn-sm showfd text-white"  href="javascript:void(0)" data-rev="{{$feedback->review}}" data-ra="{{$feedback->rating}}" data-activity="receive">Your Feedback</a> 
                  @endif
                @endforeach

            </td>

            <?php $id++ ?>

          @endif

          

      </tr>

@endforeach
                            

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="showDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Meeting as a <span id="userPlay"></span> with <span class="seekerName"></span></h4>
          </div>
          <div class="modal-body">

            <table class="table" id="newColDetails">
                <tr>
                    <td><h5><i class="icon-head"></i> User Name</h5></td>
                    <td><h6 class="seekerName"></h6></td>
                </tr>
                <tr>
                    <td><h5><i class="icon-clock5"></i> Start Time</h5></td>
                    <td><h6 class="sTime"></h6></td>
                </tr>
                <tr>
                    <td><h5><i class="icon-clock5"></i> End Time</h5></td>
                    <td><h6 class="eTime"></h6></td>
                </tr>
                <tr>
                    <td><h5><i class="icon-location4"></i> Location</h5></td>
                    <td><h6 class="location"></h6></td>
                </tr>
                <tr>
                    <td><h5><i class="icon-file2"></i> Description</h5></td>
                    <td><h6 class="description"></h6></td>
                </tr>
            </table>

         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="feedbackM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Meeting feedback details</h4>
          </div>
          <div class="modal-body">
          <h4 class="feed-text"></h4>
          <h6 class="feed-rae">Rating: 
            <span class="feed-rate5">
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
            </span>
            <span class="feed-rate4">
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star-outline yellow darken-2"></i>
            </span>
            <span class="feed-rate3">
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star yellow darken-2"></i>
              <i class="icon-android-star-outline yellow darken-2"></i>
              <i class="icon-android-star-outline yellow darken-2"></i>
            </span>
          </h6>
          <h6 class="feed-review"></h6>


         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Basic Tables end -->



<img src="/img/spinner/cbhd.gif" class="conImageCenter" alt="">



</div> {{-- content-body end --}}


@section('script')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


<script>
$(document).ready(function() {

    jconfirm.defaults = {
        theme: 'material',  // 'dark' , 'supervan' // 'material', 'bootstrap'
        useBootstrap: false,
        typeAnimated: true,
        animation: 'scaleY',
        closeAnimation: 'scale',
        animationSpeed: 700 // .7 seconds
    };


    var NowMoment = moment();
    var feedbackRating;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $('#table').DataTable({

    // start -> no-sort class name diye orderable false korte chaii..
      // "order": [[0, 'desc']],
      "order": [],
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      }],
      "language": {
        "zeroRecords": "Your don't have any feedback"
      },

    // end <- no-sort class name diye orderable false korte chaii..

      "columns": [
          // { "searchable": false, orderable: false, 'visible': false },
          { "searchable": false, },
          null,
          null,
          null,
          null
        ] 
  });

//--> showDetails
    $('body').on('click', '.showDetails', function () {

        var allData = $(this).data('info').split('--r-a-9-9-mr,');

        var userP = $(this).data('user');

        if(userP == "seeker"){
            $('#userPlay').text("Help seeker");
        }else{
            $('#userPlay').text("Help provider");
        }

        $('.seekerName').text(allData[1]);
        $('#newColDetails .sTime').text(moment(allData[2]).format("LLLL"));
        $('#newColDetails .eTime').text(moment(allData[3]).format("LLLL"));
        $('#newColDetails .location').text(allData[4]);
        $('#newColDetails .description').text(allData[5]);    
    });//<--.showDetails//--> showDetails


    //-->showfd
    $('body').on('click', '.showfd', function () {




          var activity = $(this).data('activity');
          var review = $(this).data('rev');
          var rating = $(this).data('ra');

          if(activity == "give"){
            $('.feed-text').text("You have given feedback for this meeting")
          }else{

            $('.feed-text').text("You have received feedback for this meeting")
          }
          if(rating == 5){
            $('.feed-rate4').hide();
            $('.feed-rate3').hide();
            $('.feed-rate5').show();

          }else if(rating == 4){
            $('.feed-rate3').hide();
            $('.feed-rate5').hide();
            $('.feed-rate4').show();

          }else{
            $('.feed-rate4').hide();
            $('.feed-rate5').hide();
            $('.feed-rate3').show();

          }
          

          $('.feed-review').text("Review: " + review);



          console.log(activity);
          console.log(review);
          console.log(rating);

          $('#feedbackM').modal('show');
      });//<--.showfd




});


</script>
@endsection


@endsection
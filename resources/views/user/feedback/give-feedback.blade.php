
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
    <h2 class="content-header-title">Give Collaboration feedback</h2>
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
                <h4 class="card-title">Collaboration Feedback</h4>
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
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                                <?php $id=1 ?>
@foreach ($getevents as $event)

    @if ($event->feedback->count() < 2 )

        @if(!$event->is_gave_feedback())


                  <tr>
                  <th scope="row">{{$id}}</th>                

                  @if($event->seeker->id != Auth::id())
                    <td>{{ $event->seeker->name }}</td>
                    <td><a href="{{ route('vi.profile',['id'=> $event->seeker->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                    <td><a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->seeker->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}">View Details</a>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm acceptReq text-white" id="acceptId{{$event->id}}" href="javascript:void(0)" data-id="{{$event->seeker->id}}" data-colid="{{$event->id}}" >Give Feedback</a> 

                    </td>
                    <?php $id++ ?>

                  @else

                    <td>{{ $event->provider->name }}</td>
                    <td><a href="{{ route('vi.profile',['id'=> $event->provider->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                    <td>
                      <a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->provider->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}">View Details</a>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm acceptReq text-white" id="acceptId{{$event->id}}" href="javascript:void(0)" data-id="{{$event->provider->id}}" data-colid="{{$event->id}}"  >Give Feedback</a> 

                    </td>

                    <?php $id++ ?>

                  @endif

                  

              </tr>

            @endif
      @endif

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
            <h4 class="modal-title" id="myModalLabel1">Collaboration with <span class="seekerName"></span></h4>
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
            <h4 class="modal-title" id="myModalLabel1">Collaboration feedback</h4>
          </div>
          <div class="modal-body">
          <form action="" class="formName">
            <div class="form-group">
              <label>Your review.</label>
              <textarea class="form-control" id="feedbackMsg" placeholder="Write here" class="instruction form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Rating ( <span id="rating-text" style="font-size: 15px;font-weight: 600;"></span> )</label>
              <div id="rateYo"></div>
            </div>

          </form>


         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success feedbackSubmit" >Submit</button>
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
        $('.seekerName').text(allData[1]);
        $('#newColDetails .sTime').text(moment(allData[2]).format("LLLL"));
        $('#newColDetails .eTime').text(moment(allData[3]).format("LLLL"));
        $('#newColDetails .location').text(allData[4]);
        $('#newColDetails .description').text(allData[5]);    
    });//<--.showDetails//--> showDetails

    var userId;
    var colId;
    //-->acceptReq
    $('body').on('click', '.acceptReq', function () {
         userId = $(this).data('id');
         colId = $(this).data('colid');


        $('#feedbackM').modal('show');

          feedbackRating = $("#rateYo").rateYo({
            rating: 5,
            fullStar: true,
            onChange: function (rating, rateYoInstance) {
             
              if(rating == 1){
                $('#rating-text').text('Bad');
              }
              if(rating == 2){
                $('#rating-text').text('Good');
              }
              if(rating == 3){
                $('#rating-text').text('Average');
              }
              if(rating == 4){
                $('#rating-text').text('Best');
              }
              if(rating == 5){
                $('#rating-text').text('Excellent');
              }

            }
          });
          $('#rating-text').text('Excellent');



      });//<--.acceptReq


    $('body').on('click', '.feedbackSubmit', function () {
         
          feedbackMsg =$('#feedbackMsg').val();
          rate = feedbackRating.rateYo("rating");

          // console.log(feedbackMsg);
          // console.log(rate);
          // console.log(userId);
          // console.log(colId);

           $.ajax({
               type: 'post',
               url: '/submit-feedback',
               beforeSend: function(){
                 $('.conImageCenter').show(400);
               },
               data: {
                   // 'description': $('#fname').val(),
                  'review': feedbackMsg,
                  'rating': rate,
                  'receiver_id': userId,
                  'colId': colId
               },
               success: function(data) {

                  console.log(data);

                 $('.conImageCenter').hide();
                 if(data.errors){

                 }else{

                     iziToast.success({
                     timeout: 3000,
                     title: 'Success!',
                     message: "Your feedback has been submitted."
                       });

                     $('#feedbackM').modal('hide');
                    window.location.reload() 
                 }

               }          
             });// end ajax

      });//<--.acceptReq




});


</script>
@endsection


@endsection
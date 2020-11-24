
@extends('layouts.app-user')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">New Meeting Request</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">New Meeting Request
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
                <h4 class="card-title">Meeting Request</h4>
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
                    <p class="card-text">You can accept help seeker request by clicking accept button or simply reject the request by clicking cancel button</p>
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
                                    <th>Request send at</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                                <?php $id=1 ?>
                                @foreach ($getevents as $event)
                                    <tr>
                                    <th scope="row">{{$id}}</th>
                                    {{-- <td>{{ $event->provider->name }}</td> --}}
                                    <td>{{ $event->seeker->name }}</td>
                                    <td><a href="{{ route('vi.profile',['id'=> $event->seeker->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                                    <td><a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->seeker->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}">View Details</a></td>
                                    <td>{{ $event->created_at->diffForHumans() }}</td>
                                    <td>
                                        {{-- <a href="{{ route('accept.meeting',['id'=>$event->id]) }}" class="btn btn-info   btn-sm">Accept</a>  --}}
                                        <a class="btn btn-info btn-sm acceptReq text-white" id="acceptId{{$event->id}}" href="javascript:void(0)" data-id="{{$event->id}}"  >Accept</a> 
                                        <a id="rejectId{{$event->id}}" class="btn btn-danger  btn-sm text-white rejectReq" href="javascript:void(0)" data-id="{{$event->id}}" >Reject</a>

                                    </td>
                                </tr>
                                <?php $id++ ?>

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
            <h4 class="modal-title" id="myModalLabel1">Meeting request from <span class="seekerName"></span></h4>
          </div>
          <div class="modal-body">

            <table class="table" id="newColDetails">
                <tr>
                    <td><h5><i class="icon-head"></i> Seeker Name</h5></td>
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
</div>
<!-- Basic Tables end -->



<img src="/img/spinner/cbhd.gif" class="conImageCenter" alt="">



</div> {{-- content-body end --}}


@section('script')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


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
        "zeroRecords": "You don't have any meeting request"
      },

    // end <- no-sort class name diye orderable false korte chaii..

      "columns": [
          // { "searchable": false, orderable: false, 'visible': false },
          { "searchable": false, },
          null,
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

    //-->acceptReq
    $('body').on('click', '.acceptReq', function () {
         var eventId = $(this).data('id');
         var btnThis = $(this);

         var acceptId="#acceptId"+eventId;
         var rejectId="#rejectId"+eventId;


        


$.confirm({           
     // icon: 'glyphicon glyphicon-heart',
     title: 'Confirm!',
     content: 'Are you sure want to accept this request? ',
     type: 'blue', // error/red success/green  orange blue purple dark
     // boxWidth: '30%',    
     buttons: {
       Yes:{
           text: 'Yes',
           btnClass: 'btn-blue',
           keys: ['enter'],
           action: function(){
               $.confirm({
                    type: 'blue',
                   title: 'Give some instructions!',
                   content: '' +
                   '<form action="" class="formName">' +
                   '<div class="form-group">' +
                   '<textarea placeholder="Write here" class="instruction form-control"></textarea>' +
                   '</div>' +
                   '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function () {
                                var instruction = this.$content.find('.instruction').val();
                                if(!instruction){
                                    $.alert('Please enter something');
                                    return false;
                                }

                                $.ajax({
                                    type: 'post',
                                    url: '/accept-meeting/'+eventId,
                                    beforeSend: function(){
                                      $('.conImageCenter').show(400);
                                    },
                                    data: {
                                        // 'description': $('#fname').val(),
                                        'provider_msg': instruction
                                    },
                                    success: function(data) {

                                      $('.conImageCenter').hide();
                                      if(data.error){   
                                      }else{

                                        $(acceptId).text('Accepted');
                                        $(acceptId).removeAttr("href");
                                        $(acceptId).removeClass("acceptReq");
                                        $(rejectId).hide(400);

                                          iziToast.success({
                                          timeout: 8000,
                                          title: 'Success!',
                                          message: "This request has been accepted."
                                            });
                                      }
                                    }          
                                  });// end ajax




                            }
                        },
                        cancel: function () {
                            iziToast.error({
                              title: 'Error!',
                              timeout: 4000,
                              message: "Please try again"
                            });
                        },
                    },//button
                })
               
           }
       },
       No: function () {
       }
     }// buttons
});


    });//<--.acceptReq

    //-->rejectReq
    $('body').on('click', '.rejectReq', function () {
         var eventId = $(this).data('id');
         var btnThis = $(this);

         var acceptId="#acceptId"+eventId;
         var rejectId="#rejectId"+eventId;

         $.confirm({           
              // icon: 'glyphicon glyphicon-heart',
              title: 'Confirm!',
              content: 'Are you sure want to reject this request? ',
              type: 'red', // error/red success/green  orange blue purple dark
              // boxWidth: '30%',    
              buttons: {
                Yes:{
                    text: 'Yes',
                    btnClass: 'btn-red',
                    keys: ['enter'],
                    action: function(){
                        $.ajax({
                            type: 'get',
                            url: '/reject-meeting/'+eventId,
                            beforeSend: function(){
                              $('.conImageCenter').show(400);
                            },
                            success: function(data) {
                              $('.conImageCenter').hide();
                              if(data == "success"){
                                $(rejectId).text('Rejected');
                                $(rejectId).removeAttr("href");
                                $(rejectId).removeClass("rejectReq");
                                $(acceptId).hide(400);

                                  iziToast.success({
                                  timeout: 8000,
                                  title: 'Rejected!',
                                  message: "This request has been rejected."
                                    });
                              }else{
                                    iziToast.error({
                                    timeout: 8000,
                                    title: 'Error!',
                                    message: "Please try again."
                                      });
                              }
                            }          
                          });// end ajax

                        
                    }
                },
                No: function () {
                }
              }// buttons
         });

    }); //<--- rejectReq


});


</script>
@endsection


@endsection
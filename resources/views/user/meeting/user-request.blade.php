
@extends('layouts.app-user')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Your meeting request</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">Meeting request
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
                    <p class="card-text">You can cancel the request by clicking cancel button </p>
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
                                    <td>{{ $event->provider->name }}</td>
                                    <td><a href="{{ route('vi.profile',['id'=> $event->provider->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                                    <td><a class="btn btn-success  btn-sm showDetails text-white"  data-toggle="modal" data-target="#showDetails" data-info="{{$event->id}}--r-a-9-9-mr,{{$event->provider->name}}--r-a-9-9-mr,{{$event->start_time}}--r-a-9-9-mr,{{$event->end_time}}--r-a-9-9-mr,{{$event->place}}--r-a-9-9-mr,{{$event->description}}" data-id="{{$event->id}}" >Edit Details</a></td>
                                    <td>{{ $event->created_at->diffForHumans() }}</td>
                                    <td>
                                        {{-- <a href="{{ route('accept.meeting',['id'=>$event->id]) }}" class="btn btn-info   btn-sm">Accept</a>  --}}
                                        <a id="cancelId{{$event->id}}" class="btn btn-danger  btn-sm text-white cancelReq" href="javascript:void(0)" data-id="{{$event->id}}" >Cancel</a>

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

<div class="modal fade" id="makeMeetingModal" tabindex="-1" role="dialog" aria-labelledby="makeMeetingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel1">Update meeting request to <span class="providerName"></span></h4>
          </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="place">Location</label>
            <div class="position-relative has-icon-left">
                <input type="text" id="place" class="form-control @error('place') is-invalid @enderror" placeholder="Place"  value="{{old('place')}}" name="place" required autocomplete="place" autofocus>
                <div class="form-control-position">
                    <i class="icon-android-compass"></i>
                </div>

                @error('place')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <div class="position-relative has-icon-left">
                <input type="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}" required name="date">
                <div class="form-control-position">
                    <i class="icon-calendar5"></i>
                </div>

                @error('date')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="starttime">Start Time</label>
                    <div class="position-relative has-icon-left">
                        <input type="time" id="starttime" class="form-control @error('starttime') is-invalid @enderror" value="{{old('starttime')}}" required name="starttime">
                        <div class="form-control-position">
                            <i class="icon-clock5"></i>
                        </div>

                        @error('starttime')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endtime">End Time</label>
                    <div class="position-relative has-icon-left">
                        <input type="time" id="endtime" class="form-control @error('endtime') is-invalid @enderror" value="{{old('endtime')}}" required name="endtime">
                        <div class="form-control-position">
                            <i class="icon-clock5"></i>
                        </div>

                        @error('endtime')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <div class="position-relative has-icon-left">
                <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Describe your problem here" required>{{old('description')}}</textarea>
                <div class="form-control-position">
                    <i class="icon-file2"></i>
                </div>
                @error('description')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

      </div> {{-- modal body --}}


      <div class="modal-footer">
        <button type="button" class="btn btn-success udateCol">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





{{-- asdfsdfa --}}










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


    var collaborationId;

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
        collaborationId = $(this).data('id');
        var allData = $(this).data('info').split('--r-a-9-9-mr,');
        $('.providerName').text(allData[1]);

        // show modal
        $('#makeMeetingModal').modal('show');



        $.ajax({
            type: 'get',
            url: '/single-meeting/'+collaborationId,
            beforeSend: function(){
              $('.conImageCenter').show(400);
            },
            success: function(data) {
              $('.conImageCenter').hide();
              $('#date').val(moment(data.start_time).format("YYYY-MM-DD"));
              $('#starttime').val(moment(data.start_time).format("HH:mm"));
              $('#endtime').val(moment(data.end_time).format("HH:mm"));
              $('#place').val(data.place);
              $('#description').val(data.description);  
            }, //end success
          });// end ajax

    });
    // udateCol
    $('body').on('click', '.udateCol', function () {
        var place = $('#place').val();
        var date = $('#date').val();
        var starttime = $('#starttime').val();
        var endtime = $('#endtime').val();
        var description = $('#description').val();  

        console.log(place);

        $.ajax({
            type: 'post',
            url: '/update-meeting/'+collaborationId,
            data: {place: place, date: date, starttime: starttime, endtime: endtime, description:description},
            beforeSend: function(){
              $('.conImageCenter').show(400);
            },
            success: function(data) {
              $('.conImageCenter').hide();
              if(data){
                  iziToast.success({
                  timeout: 6000,
                  title: 'Updated!',
                  message: "This request has been updated."
                    });

                  setTimeout(function()
                  {   
                      $('#makeMeetingModal').modal('hide');

                  }, 500);

                  setTimeout(function()
                  {   
                      // make empty
                      $('#date').val();
                      $('#starttime').val();
                      $('#endtime').val();
                      $('#place').val();
                      $('#description').val(); 

                  }, 1000);



              }else{
                    iziToast.error({
                    timeout: 8000,
                    title: 'Error!',
                    message: "Please fill up all the fields."
                      });
              }
            }, //end success
          });// end ajax
    })



    //-->cancelReq
    $('body').on('click', '.cancelReq', function () {
         var eventId = $(this).data('id');
         var btnThis = $(this);

         var cancelId="#cancelId"+eventId;

         $.confirm({           
              // icon: 'glyphicon glyphicon-heart',
              title: 'Confirm!',
              content: 'Are you sure want to cancel this request? ',
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
                            url: '/cancel-meeting/'+eventId,
                            beforeSend: function(){
                              $('.conImageCenter').show(400);
                            },
                            success: function(data) {
                              $('.conImageCenter').hide();
                              if(data == "success"){
                                $(cancelId).text('Cancelled');
                                $(cancelId).removeAttr("href");
                                $(cancelId).removeClass("cancelReq");

                                  iziToast.success({
                                  timeout: 8000,
                                  title: 'Cancelled!',
                                  message: "This request has been cancelled."
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

    }); //<--- cancelReq


});


</script>
@endsection


@endsection

@extends('layouts.app-user')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection


@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">New Connect Request</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li>
        <li class="breadcrumb-item active">New Connect Request
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
                <h4 class="card-title">Connect Request</h4>
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
                <div class="card-block card-dashboard">
                    <p class="card-text">You can accept connect request by clicking accept button or simply reject the request by clicking reject button</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>


                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th class="no-sort">Profile</th>
                                    <th>Request send at</th>
                                    <th  class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                                <?php $id=1 ?>
                                @foreach ($connects as $connect)
                                    <tr>
                                    <th scope="row">{{$id}}</th>
                                    <td>{{ $connect->requestBy->name }}</td>
                                    <td><a href="{{ route('vi.profile',['id'=> $connect->requestBy->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                                    <td>{{ $connect->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-info   btn-sm acceptReq text-white" id="acceptId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Accept</a> 
                                        <a class="btn btn-danger  btn-sm rejectReq text-white" id="rejectId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Reject</a>

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
</div>
<!-- Basic Tables end -->


<img src="/img/spinner/cbhd.gif" class="conImageCenter" alt="">



</div> {{-- content-body end --}}

@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
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


        $('#table').DataTable({

          // start -> no-sort class name diye orderable false korte chaii..
            // "order": [[0, 'desc']],
            "order": [],
            "columnDefs": [ {
              "targets"  : 'no-sort',
              "orderable": false,
            }],
            "language": {
              "zeroRecords": "You don't have new connect request"
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


            //-->acceptReq
    $('body').on('click', '.acceptReq', function () {
         var conId = $(this).data('id');
         var btnThis = $(this);

         var acceptId="#acceptId"+conId;
         var rejectId="#rejectId"+conId;

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
                        $.ajax({
                            type: 'get',
                            url: '/connect-accept/'+conId,
                            beforeSend: function(){
                                $('.conImageCenter').show(400);
                            },
                            success: function(data) {
                                $('.conImageCenter').hide();
                              if(data == "success"){
                                $(acceptId).text('Accepted');
                                $(acceptId).removeAttr("href");
                                $(acceptId).removeClass("acceptReq");
                                $(rejectId).hide(400);

                                  iziToast.success({
                                  timeout: 6000,
                                  title: 'Accepted!',
                                  message: "This request has been accepted."
                                    });
                              }else{
                                    iziToast.error({
                                    timeout: 6000,
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

    }); //<--- acceptReq


        //-->rejectReq
        $('body').on('click', '.rejectReq', function () {
             var conId = $(this).data('id');
             var btnThis = $(this);

             var acceptId="#acceptId"+conId;
             var rejectId="#rejectId"+conId;

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
                                url: '/conncet-reject/'+conId,
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
                                          timeout: 6000,
                                          title: 'Rejected!',
                                          message: "This request has been rejected."
                                        });
                                  }else{
                                    iziToast.error({
                                        timeout: 6000,
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
        
    });// end jquery

</script>

@endsection
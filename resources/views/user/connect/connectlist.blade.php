
@extends('layouts.app-user')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Your Connect List</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li>
        <li class="breadcrumb-item active">Connect List
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
                    <p class="card-text">You can remove connect by clicking remove button or simply block the connect by clicking block button</p>
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>


                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th class="no-sort">Profile</th>
                                    <th>Connected</th>
                                    <th  class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                        
                                <?php $id=1 ?>
                                @foreach ($connects as $connect)
                                    <tr>
                                    <th scope="row">{{ $id }}</th>

                                    @if ($connect->requestBy->id == Auth::id())
                                        {{-- expr --}}
                                        <td>{{ $connect->requestTo->name }}</td>
                                        <td><a href="{{ route('vi.profile',['id'=> $connect->requestTo->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                                        <td>{{ $connect->created_at->diffForHumans() }}</td>
                                        
                                        <td>
                                        
                                            <a class="btn btn-danger  btn-sm text-white removeCon" id="removeId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Remove</a>
                                            <a class="btn btn-danger  btn-sm text-white blockCon" id="blockId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Block</a>

                                        </td>
                                    @else
                                        <td>{{ $connect->requestBy->name }}</td>
                                        <td><a href="{{ route('vi.profile',['id'=> $connect->requestBy->id]) }}" class="btn btn-success  btn-sm ">Visit Profile</a></td>
                                        <td>{{ $connect->created_at->diffForHumans() }}</td>
                                        

                                        <td>
                                        
                                            <a class="btn btn-danger  btn-sm text-white removeCon" id="removeId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Remove</a>
                                            <a class="btn btn-danger  btn-sm text-white blockCon" id="blockId{{$connect->id}}" href="javascript:void(0)" data-id="{{$connect->id}}">Block</a>

                                        </td>
                                        
                                        
                                    @endif



                                   
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
              "zeroRecords": "You don't have any connect"
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


            //-->removeCon
    $('body').on('click', '.removeCon', function () {
         var conId = $(this).data('id');
         var btnThis = $(this);

         var removeId="#removeId"+conId;
         var blockId="#blockId"+conId;

         $.confirm({           
              // icon: 'glyphicon glyphicon-heart',
              title: 'Confirm!',
              content: 'Are you sure want to remove this contact? ',
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
                            url: '/connect-remove/'+conId,
                            beforeSend: function(){
                                $('.conImageCenter').show(400);
                            },
                            success: function(data) {
                                $('.conImageCenter').hide();
                              if(data == "success"){
                                $(removeId).text('Removed');
                                $(removeId).removeAttr("href");
                                $(removeId).removeClass("removeCon");
                                $(blockId).hide(400);

                                  iziToast.success({
                                  timeout: 6000,
                                  title: 'Removed!',
                                  message: "This connect has been removed."
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

    }); //<--- removeCon


        //-->blockCon
        $('body').on('click', '.blockCon', function () {
             var conId = $(this).data('id');
             var btnThis = $(this);

             var removeId="#removeId"+conId;
             var blockId="#blockId"+conId;

             $.confirm({           
                  // icon: 'glyphicon glyphicon-heart',
                  title: 'Confirm!',
                  content: 'Are you sure want to block this connect? ',
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
                                url: '/connect-block/'+conId,
                                beforeSend: function(){
                                    $('.conImageCenter').show(400);
                                },
                                success: function(data) {
                                    $('.conImageCenter').hide();
                                  if(data == "success"){
                                    $(blockId).text('Blocked');
                                    $(blockId).removeAttr("href");
                                    $(blockId).removeClass("blockCon");
                                    $(removeId).hide(400);

                                      iziToast.success({
                                          timeout: 6000,
                                          title: 'Blocked!',
                                          message: "This connect has been blocked."
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

        }); //<--- blockCon
        
    });// end jquery

</script>
@endsection



@extends('layouts.app-admin')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">All users</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">all users
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
                <h4 class="card-title">All deactive users</h4>
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
                    <p class="card-text">You can active user by clicking active button.</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    


                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>


                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th class="no-sort">Profile</th>
                                    <th class="no-sort">Joined at</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php $id=1 ?>
                              @foreach ($users as $user)
                              <tr>
                                  <th scope="row">{{$id}}</th>
                                  <td>{{ $user->name }}</td>
                                  <td><a href="" class="btn btn-success  btn-sm ">Visit profile</a></td>
                                  <td>{{ $user->created_at->diffForHumans() }}</td>
                                  <td>

                                        <button class="btn btn-success btn-sm text-white active-user" data-id="{{$user->id}}">Active</button>
                                    </td>

                                      {{-- <a class="btn btn-info btn-sm  text-white" href="{{ route('admin.users.deac',['id'=>$user->id]) }}" >Deactive</a> --}}
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


<div class="modal fade" id="activeUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form action="" method="POST" id="activeUserForm">
        @csrf

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Active user</h4>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold" style="font-size: 17px">
           Are you sure you want to active this user ?
        </p>

        
     </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Yes, Active</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
      </div>
    </div>
    </form>
  </div>
</div>









<img src="/img/spinner/cbhd.gif" class="conImageCenter" alt="">



</div> {{-- content-body end --}}


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
        "zeroRecords": "You don't have any user"
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




  $('body').on('click', '.active-user', function () {

      var userId = $(this).data('id');

      var form = document.getElementById('activeUserForm');
      form.action = '/admin/user-active/' + userId;

      $('#activeUserModal').modal('show');
  });








});


</script>
@endsection


@endsection

@extends('layouts.app-admin')

@section('style')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

 <style type="text/css">
   #table th, #table td {
       padding-top: 9px;
       padding-bottom: 8px;
   }
 </style>

@endsection

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">All Skills</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">all skills
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
                <h4 class="card-title">All skills</h4>
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
                    <p class="card-text" style="display: inline-block; text-align: left;">You can edit and delete the skill by following action buttons.</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    
                    <button class="btn btn-success btn-sm text-white new-skill" style="display: inline-block; float: right;">Add new skill</button>

                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>


                                <tr>
                                    <th>#</th>
                                    <th>Skill</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php $id=1 ?>
                              @foreach ($skills as $skill)
                              <tr>
                                  <th scope="row">{{$id}}</th>
                                  <td>{{ $skill->name }}</td>
                                  <td>

                                        <button class="btn btn-info btn-sm text-white edit-skill" data-id="{{$skill->id}}" data-skill="{{$skill->name}}">Edit</button>
                                        
                                        <button class="btn btn-danger btn-sm text-white delete-skill" data-id="{{$skill->id}}">Delete</button>
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

<div class="modal fade" id="newskillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form action="{{ route('skill.add') }}" method="POST" id="newskillForm">
        @csrf

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Add new skill</h4>
      </div>
      <div class="modal-body">
        
      <div class="row">
          <div class="col-md-12" style="margin: auto">
              <div class="form-group">
                  <label for="projectinput1">Skill</label>
                  <input type="text" id="projectinput1" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  required>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong>* {{ $message }}</strong>
                  </span>
                  @enderror

              
              </div>
          </div>
          
      </div>

        
     </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>


<div class="modal fade" id="editskillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form action="" method="POST" id="editskillForm">
        @csrf

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Edit skill (<span id="skilln"></span>)</h4>
      </div>
      <div class="modal-body">
        
      <div class="row">
          <div class="col-md-12" style="margin: auto">
              <div class="form-group">
                  <label for="projectinput1">Skill</label>
                  <input type="text" id="skillname" name="name" class="form-control @error('name') is-invalid @enderror" required >

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong>* {{ $message }}</strong>
                  </span>
                  @enderror

              
              </div>
          </div>
          
      </div>

        
     </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>



<div class="modal fade" id="deleteSkillModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <form action="" method="POST" id="deleteSkillForm">
        @csrf

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Delete admin</h4>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold" style="font-size: 17px">
           Are you sure you want to delete this admin ?
        </p>

        
     </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" >Yes, Delete</button>
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
          null
        ] 
  });




  $('body').on('click', '.new-skill', function () {

      $('#newskillModal').modal('show');
  });


  $('body').on('click', '.edit-skill', function () {

      var skillId = $(this).data('id');
      var skill = $(this).data('skill');

      $('#skillname').val(skill);
      $('#skilln').text(skill);

      var form = document.getElementById('editskillForm');
      form.action = '/admin/skill-edit/' + skillId
      $('#editskillModal').modal('show');
  });




  $('body').on('click', '.delete-skill', function () {

      var skillId = $(this).data('id');

      var form = document.getElementById('deleteSkillForm');
      form.action = '/admin/skill-delete/' + skillId;

      $('#deleteSkillModal').modal('show');
  });








});


</script>
@endsection


@endsection
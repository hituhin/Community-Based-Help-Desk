
@extends('layouts.app-user')
@section('style')

<style type="text/css">
    
	.active_chat {
	    background: #ebebeb;
	 
	}
	.mymsgli:hover {
	    background: #ebebeb;
	}
</style>
@endsection


@section('content')

    <private-chat :user="{{auth()->user()}}" ></private-chat>



<div class="modal fade" id="makeMeetingModal" tabindex="-1" role="dialog" aria-labelledby="makeMeetingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="makeMeetingModalLabel">New Meeting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">






<form class="form" action="{{route('addevent')}}" method="POST">
    <div class="form-body">

        @csrf
        <div class="form-group">
            <label for="place">Location</label>
            <div class="position-relative has-icon-left">
                <input type="hidden" id="provId" name="provider_id" >
                <input type="text" id="place" class="form-control @error('place') is-invalid @enderror" placeholder="Place"  value="{{old('place')}}" name="location" required autocomplete="place" autofocus>
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
    </div>

    <div class="form-actions right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="icon-cross2"></i> Cancel
        </button>
        <button type="submit" class="btn btn-success">
            <i class="icon-check2"></i> Create
        </button>
    </div>
</form>










      </div>

    </div>
  </div>








@endsection

@section('script')

<script>
	
    $('body').on('click', '#make-meeting', function(){

        var providerId = $(this).data('info');
        $('#provId').val(providerId);

        $('#makeMeetingModal').modal('show');
    });


</script>




@endsection

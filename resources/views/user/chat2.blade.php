
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


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">CBHD Messenger</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        </li>
        <li class="breadcrumb-item active">Messenger
        </li>
      </ol>
    </div>
  </div>
</div>

<div class="content-body">

    <section id="card-actions">
        <div class="row">
            <div class="col-xs-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Messenger</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 mb-2">

                                    <div class="card" style="height: 436px;">
                                        <div class="card-header">
                                            <h4 class="card-title">Contacts</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></a>
                                        </div>
                                        <div class="card-body">

                                            <ul class="list-group list-group-flush"  style="height: 300px">
                                                <li class="list-group-item mymsgli" style="padding: 10px 7px; padding-bottom: 0px; padding-top: 14px;">
                                                    <fieldset class="form-group position-relative ">
                                                        <div class="input-group">
                                                            <input id="myInput" type="text" placeholder="Search contact" name="q" value="" class="form-control  input-lg" style="height: 32px; font-size: 16px;"> <span  class="input-group-addon btn btn-success rounded rounded-right" ><i class="icon-android-search font-medium-4"></i></span>
                                                        </div>
                                                    </fieldset>                                                
                                                </li>

                                                
                                                <div style="height: 400px; overflow-y:scroll;" id="myList" >

                                                    <li class="list-group-item mymsgli active_chat" style="padding: 10px 7px;">

                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 50px;height: 50px;">
                                                            </a>
                                                            <div class="media-body">
                                                                <p class="media-heading" style="font-size: 16px; font-weight: 600;">Top Aligned Media 
                                                                    <span class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0;">online</span>
                                                                    <span class="tag tag-default tag-pill bg-info float-xs-right" style="padding: 4px 7px; margin: 0 0;">2</span>
                                                                    
                                                                </p>
                                                        
                                                                <p style="margin: 0px; margin-top: -8px; font-size: 14px;">Hello Masud i really... <i class="icon-clock5"></i> 2 minutes ago</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item mymsgli" style="padding: 10px 7px;">

                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 50px;height: 50px;">
                                                            </a>
                                                            <div class="media-body">
                                                                <p class="media-heading" style="font-size: 16px; font-weight: 600;">Top Aligned Media 
                                                                    <span class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0;">online</span>
                                                                    <span class="tag tag-default tag-pill bg-info float-xs-right" style="padding: 4px 7px; margin: 0 0;">2</span>
                                                                    
                                                                </p>
                                                        
                                                                <p style="margin: 0px; margin-top: -8px; font-size: 14px;">Hello Masud i really need</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item mymsgli" style="padding: 10px 7px;">

                                                        <div class="media">
                                                            <a class="media-left" href="#">
                                                                <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 50px;height: 50px;">
                                                            </a>
                                                            <div class="media-body">
                                                                <p class="media-heading" style="font-size: 16px; font-weight: 600;">Top Aligned Media 
                                                                    <span class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0;">online</span>
                                                                    <span class="tag tag-default tag-pill bg-info float-xs-right" style="padding: 4px 7px; margin: 0 0;">2</span>
                                                                    
                                                                </p>
                                                        
                                                                <p style="margin: 0px; margin-top: -8px; font-size: 14px;">Hello Masud i really need</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                   

                                                </div>
                                            </ul>
                                         </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8">
                                    <div class="card" >
                                        <div class="card-header">
                                            <div class="card-title">
                                                <div class="media">
                                                    <a class="media-left" href="#">
                                                        <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 40px;height: 40px;">
                                                    </a>
                                                    <div class="media-body">
                                                        <p class="media-heading" style="font-size: 16px; font-weight: 600; margin-top: 7px;">Masud Rana
                                                            <span class="tag tag-default tag-pill bg-success " style="font-size: 12px; padding: 2px 5px; margin: 0px;">online</span>                                                  
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    {{-- <li><a data-action="reload"><i class="icon-reload"></i></a></li> --}}
                                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                                    <li>

                                                        <button type="button" class="dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-android-settings"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Block</a>
                                                            <a class="dropdown-item" href="#">Clear All</a>
                                                            
                                                            
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>



                                        <div class="card-body collapse in" style="height: 400px; overflow-y: scroll;">
                                            <div class="card-block" data-simplebar>
                                                <div class="incoming" style="width: 70%; float: left; margin-bottom: 15px;">
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 40px;height: 40px;">
                                                        </a>
                                                        <div class="media-body">
                                                            <p style="background: #ebebeb none repeat scroll 0 0; color: #646464; font-size: 14px; margin: 0; padding: 5px 10px 5px 12px; display: inline-block;">Hello Dj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How ar</p>
                                                            <span style="color: #747474; display: block; font-size: 12px; margin: 8px 0 0;"> 11:01 AM | June 9</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="incoming" style="width: 70%; float: left; margin-bottom: 15px;">
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 40px;height: 40px;">
                                                        </a>
                                                        <div class="media-body">
                                                            <p style="background: #ebebeb none repeat scroll 0 0; color: #646464; font-size: 14px; margin: 0; padding: 5px 10px 5px 12px; display: inline-block;">Hello Dj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How ar</p>
                                                            <span style="color: #747474; display: block; font-size: 12px; margin: 8px 0 0;"> 11:01 AM | June 9</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="incoming" style="width: 70%; float: left; margin-bottom: 15px;">
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object rounded-circle" src="../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image" style="width: 40px;height: 40px;">
                                                        </a>
                                                        <div class="media-body">
                                                            <p style="background: #ebebeb none repeat scroll 0 0; color: #646464; font-size: 14px; margin: 0; padding: 5px 10px 5px 12px; display: inline-block;">Hello Dj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How arDj How ar</p>
                                                            <span style="color: #747474; display: block; font-size: 12px; margin: 8px 0 0;"> 11:01 AM | June 9</span>
                                                        </div>
                                                    </div>
                                                </div>




                                                
                                            </div>
                                        </div>
                                        <div class="card-block" style="padding-top: 0;">
                                            <fieldset class="form-group position-relative "><div class="input-group"><input type="text" placeholder="Type your message" name="q" value="" class="form-control  input-lg" style=""> <span class="input-group-addon btn btn-success rounded rounded-right"><i class="icon-android-send font-medium-4"></i></span></div></fieldset>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


</div> 

@endsection

@section('style')

@endsection



@section('script')

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          if($(this).text().toLowerCase().indexOf(value) == -1){
            $(this).text('not found');
          }
        });
      });
    });

</script>


@endsection
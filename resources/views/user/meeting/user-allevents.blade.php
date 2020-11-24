
@extends('layouts.app-user')

@section('style')

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.0/fullcalendar.min.css"/>


    <style type="text/css">
         /*
        .tooltip > .tooltip-inner {
          background-color: #73AD21; 
          color: #FFFFFF; 
          border: 1px solid green; 
          padding: 15px;
          font-size: 20px;
        }
         Tooltip on top 
        .tooltip.top > .tooltip-arrow {
          border-top: 5px solid green;
        }*/
        .tooltip > .tooltip-inner {
              background-color: #73AD21;
              color: #FFFFFF;
              border: 0px solid green;
              padding: 12px;
              font-size: 15px;
              border-radius: 5px;
              text-align: left;
          }

        .tooltip.top > .tooltip-arrow {
          border-top: 1px solid green;
        }

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
    <h2 class="content-header-title">All meetings</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All meetings
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
                <h4 class="card-title">Your Meeting</h4>
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
                    <p class="card-text">You can see details by click on an event</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div  id="calendar">
   

                  


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Tables end -->



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel1">Event Details</h4>
      </div>
      <div class="modal-body">





        <table class="table" id="newColDetails">
            <tr>
                <td><h5><i class="icon-clipboard4"></i> Title</h5></td>
                <td><h6 class="title"></h6></td>
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
            <tr>
                <td><h5><i class="icon-open"></i> Status</h5></td>
                <td><h6 class="status"></h6></td>
            </tr>
        </table>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>










</div> {{-- content-body end --}}

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.0/fullcalendar.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/bn.js"></script> --}}

<script>

  jQuery(document).ready(function($) {

    // instantiate a moment object
    var NowMoment = moment();


    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        // right: 'month,agendaWeek,agendaDay,listYear,listMonth,listWeek'
        right: 'month,listWeek,listMonth,listYear'
        // right: 'month,listWeek,listMontKh,listYear'
      },
      buttonText: {
        today: 'Today',
        month: 'Month',
        // agendaWeek: 'Week',
        // agendaDay: 'Day',

        listYear: 'List Year',
        listMonth: 'List Month',
        listWeek: 'List Week'
      },
      // theme: true,    
      // themeSystem:'standard', 
      // defaultDate: '2016-05-01',
      eventTextColor: '#FFFFFF',
      timezone: "Asia/Ho_Chi_Minh",
      // defaultView: 'agendaWeek',
      editable: true,
      // selectable: true,
      selectHelper: true,
      // displayEventTime: false,
      // height:400,      
      eventLimit: true, // allow "more" link when too many events
      
      // eventRender: function(event, element, view) {
      //   if (event.allDay === 'true') {
      //     event.allDay = true;
      //   } else {
      //     event.allDay = false;
      //   }
      // },

      eventRender: function(event, element) {
          $(element).tooltip({

              title: event.title + "</br>Start at: "+ moment(event.start).format("LT") +"</br>Finish at: "+ moment(event.finish).format("LT")+"</br>Place: "+ event.place +"</br>Status: "+ event.status ,
              html: true,
              delay: { "show": 100, "hide": 500 }

            });

          if (event.color) {
              element.css('background-color', event.color)
          }
      },

      events:[
          @foreach($getevents as $event)
          {
              id:'{{$event->id}}',
              @if($event->status == 153)   
              title:'{{$event->provider_msg}}',
              @else
                  @if($event->provider_id == Auth::user()->id)
                    title:'Meeting with {{$event->seeker->name}}',
                  @else
                    title:'Meeting with {{$event->provider->name}}',
                  @endif
              @endif    
              start:'{{$event->start_time}}',
              finish:'{{$event->end_time}}',
              // url :
              place: "{{ $event->place }}",
              color: "{{ $event->color }}",
              status: "{{ $event->statusajax }}",
              realstatus: "{{ $event->status }}",
              desc: "{{ $event->description }}",
              pro_id: "{{ $event->provider_id }}",

          },
          @endforeach
      ],

      eventClick: function (event) {

          metId = event.id;
          $('#myModal').modal('show');

          $('.title').text(event.title);
          $('.sTime').text(moment(event.start).format("LT"));
          $('.eTime').text(moment(event.finish).format("LT"));
          $('.location').text(event.place);
          $('.description').text(event.desc);
          $('.status').text(event.status);





      },

      dayClick: function (date, jsEvent, view) {

                // console.log(date._d);              
                // console.log(jsEvent);              
                  


        },

        // select: function(start, end, allDay) {
 
      //   var start = new Date(start._d).toDateString();;

      //   console.log(start);
      //   console.log(end);
      // },



  // eventMouseover: function(calEvent, jsEvent) {
  //     var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;">' + calEvent.title + '</div>';
  //     $("body").append(tooltip);
  //     $(this).mouseover(function(e) {
  //         $(this).css('z-index', 10000);
  //         $('.tooltipevent').fadeIn('500');
  //         $('.tooltipevent').fadeTo('10', 1.9);
  //     }).mousemove(function(e) {
  //         $('.tooltipevent').css('top', e.pageY + 10);
  //         $('.tooltipevent').css('left', e.pageX + 20);
  //     });
  // },

  // eventMouseout: function(calEvent, jsEvent) {
  //      $(this).css('z-index', 8);
  //      $('.tooltipevent').remove();
  // },


  // -...............>>>>>>>>>>data access
  // eventClick: function(data, event, view) {
  //             var content = '<h3>'+data.title+'</h3>' + 
  //                 '<p><b>Start:</b> '+data.start+'<br />' + 
  //                 (data.end && '<p><b>End:</b> '+data.end+'</p>' || '');
  //         }


    }); //end #calendar.fullCalendar




    $('body').on('click', '#meeting_accept', function(){


        console.log(metId);
          // $.ajax({
          //   type: 'POST',
          //   url: 'deletePost',
          //   data: {
          //     '_token': $('input[name=_token]').val(),
          //     'id': $('.id').text()
          //   },
          //   success: function(data){
          //      $('.post' + $('.id').text()).remove();
          //   }
          // });
    });


    // $('body').on('click', '#meeting_cancel', function(){
    //       $.ajax({
    //         type: 'GET',
    //         url: '/c-meeting/'+metId,

    //         success: function(data){
               
    //         }
    //       });
    // });







});//end jquery


</script>
@endsection

@extends('layouts.app-user')

@section('content')


<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">All Collaboration Request</h2>
  </div>
  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a>
        </li>
        {{-- <li class="breadcrumb-item"><a href="#">All Connent Request</a>
        </li> --}}
        <li class="breadcrumb-item active">All Collaboration Request
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
                <h4 class="card-title">Collaboration Request</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <p class="card-text">You can visit user profile by clicking Visit Profile button and simply see the details of the collaboration by clicking Visit Details button</p>
                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Profile</th>
                                    <th>Details</th>
                                    <th>Request send at</th>
                                    <th >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Masud</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >10 minutes ago</td>
                                    <td>
                                        <button type="button" class="btn btn-success  btn-sm btn-min-width ">Accepted</button>

                                    </td>
                                </tr>


                                <tr>
                                    <th scope="row">2</th>
                                    <td>Rana</td>
                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >20 minutes ago</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm btn-min-width">Rejected</button>

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td>Tuhin</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >28 minutes ago</td>
                                    <td>
                                        <button type="button" class="btn btn-success  btn-sm btn-min-width ">Accepted</button>

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td>Mostafizur Rahman</td>
                                    <td width="5%" class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >1 hour ago</td>
                                    <td>
                                        <button type="button" class="btn btn-success  btn-sm btn-min-width">Accepted</button> 

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">5</th>
                                    <td>Salman Rahman</td>
                                    <td width="5%" class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >1 day ago</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-min-width btn-sm ">Rejected</button>

                                    </td>
                                </tr>


                                <tr>
                                    <th scope="row">6</th>
                                    <td>Mark</td>
                                    <td width="5%" class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> Visit Profile</button>
                                    </td>

                                    <td  class="text-center">
                                        <button type="button" class="btn btn-info  btn-sm "> View Details</button>
                                    </td>

                                    <td >2 days ago</td>
                                    <td>
                                        <button type="button" class="btn btn-success  btn-sm  btn-min-width">Accepted</button>
                                        

                                    </td>
                                </tr>

  

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Tables end -->












</div> {{-- content-body end --}}

@endsection
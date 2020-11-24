@extends('layouts.app-user')

@section('content')



<div class="content-header row">
</div>
<div class="content-body">{{-- content-body start --}}


<h2>Profile</h2>





            <!-- content section start -->
            <div class="content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <div class="user-profile">
                                        <img src="../assets/img/img/user-male.png" class="rounded-circle img-thumbnail mx-auto d-block" alt="User image">
                                    </div>
                                    
                                    <h4 class="card-title text-center">Md. Masud Rana</h4>
                                    <p class="card-category text-center">@masud99rana</p>

                                    <h5 class="card-text text-center m-1">Full Stack Web Developer | PHP Developer</h5>
                                    <hr>
                                    <div class="user-profile-fnd-icon d-flex justify-content-center ">
                                        <p class="mr-4"><i class="icon ion-md-contacts"></i> <span class="fnd-num">256</span></p>
                                        <p class="mr-4"><i class="icon ion-md-paper"></i> <span class="fnd-num">60</span></p>
                                        <p class=""><i class="icon ion-md-clipboard"></i> <span class="fnd-num">256</span></p>
                                    </div>

                                    <div class="col user-profile-btn-icon text-center">
                                          <a href="" class="btn btn-primary btn-xs"><i class="icon ion-md-person-add"></i>Add to contact</a>
                                          <a href="" class="btn btn-primary btn-xs"><i class="icon ion-md-mail"></i>Message</a>
                                      </div>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h4 class="card-title text-center ">Average user rating</h4>
                                        <h3 class="text-center">4.3 <small>/ 5</small></h3>
                                             
                                    </div>
                                    <div class="mx-auto text-center user-profile-rating">
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                          <span class="icon ion-md-medical" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class=" btn btn-warning btn-sm" aria-label="Left Align">
                                          <span class="icon ion-md-medical" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                          <span class="icon ion-md-medical" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                          <span class="icon ion-md-medical" aria-hidden="true"></span>
                                        </button>
                                        
                                        <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                          <span class="icon ion-md-medical" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="user-p-rate-break mx-auto text-center">
                                        <h4>Rating breakdown</h4>
                                        <div class="pull-left ">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">5 <span class="icon ion-md-medical"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">1</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">4 <span class="icon ion-md-medical"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">1</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">3 <span class="icon ion-md-medical"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">2 <span class="icon ion-md-medical"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">1 <span class="icon ion-md-medical"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;">0</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Next meeting will 2 days later
                                    </div>
                                </div>
                            </div>
                        </div>                                                           
                        <div class="col-md-8">
                            
                            

                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skill" role="tab" aria-selected="false">Skill</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="card-body">
                                            <div class="profiletimeline">
                                               
 <!-- 1st review start  -->
                                                <div class="media border p-3 mt-3">
                                                  <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                  <div class="media-body">
                                                    <h4>John Doe <small><i>Completed a meeting on February 19, 2016</i></small></h4>
                                                    <p>I need help to learn PHP</p>
                                                    
                                                    <div >
                                                        <div class="review-block-rate">
                                                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                              <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                              <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                              <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                              <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                              <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                            </button>
                                                        </div>
                                                        <div class="review-block-title">It was a great Experience!!</div>
                                                    </div>
                                                    
<!-- //2nd media -->
                                                     <button class="btn btn-info btn-sm second_review"><span >More..<i class="fa fa-home"></i></span></button>

                                                    <div class="second_rev">
                                                        <div class="media ">
                                                          <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                          <div class="media-body">
                                                            <h4>Masud Rana </h4>
                                                                    
                                                            <div >
                                                                <div class="review-block-rate">
                                                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                      <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                      <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                      <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                    </button>
                                                                </div>
                                                                <div class="review-block-title">Awesome Experience!!</div>
                                                            </div>



                                                            
                                                          </div>
                                                        </div>
                                                    </div> 
                                            
                                                  </div>
                                                </div>
 <!-- 1st review end  -->





  <!-- 2nd review start  -->
                                                 <div class="media border p-3 mt-3">
                                                   <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                   <div class="media-body">
                                                     <h4>John Doe <small><i>Completed a meeting on February 19, 2016</i></small></h4>
                                                     <p>I need help to learn PHP</p>
                                                     
                                                     <div >
                                                         <div class="review-block-rate">
                                                             <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                               <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                             </button>
                                                             <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                               <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                             </button>
                                                             <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                               <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                             </button>
                                                             <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                               <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                             </button>
                                                             <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                               <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                             </button>
                                                         </div>
                                                         <div class="review-block-title">It was a great Experience!!</div>
                                                     </div>
                                                     
 <!-- //2nd media -->
                                                      <button class="btn btn-info btn-sm second_review"><span >More..</span></button>

                                                     <div class="second_rev">
                                                         <div class="media ">
                                                           <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                           <div class="media-body">
                                                             <h4>Masud Rana </h4>
                                                                     
                                                             <div >
                                                                 <div class="review-block-rate">
                                                                     <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                       <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                     </button>
                                                                     <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                       <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                     </button>
                                                                     <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                       <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                     </button>
                                                                     <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                       <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                     </button>
                                                                     <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                       <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                     </button>
                                                                 </div>
                                                                 <div class="review-block-title">Awesome Experience!!</div>
                                                             </div>



                                                             
                                                           </div>
                                                         </div>
                                                     </div> 
                                             
                                                   </div>
                                                 </div>
  <!-- 2nd review end  -->


   <!-- 3rd review start  -->
                                                  <div class="media border p-3 mt-3">
                                                    <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                    <div class="media-body">
                                                      <h4>John Doe <small><i>Completed a meeting on February 19, 2016</i></small></h4>
                                                      <p>I need help to learn PHP</p>
                                                      
                                                      <div >
                                                          <div class="review-block-rate">
                                                              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                              </button>
                                                              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                              </button>
                                                              <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                              </button>
                                                              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                              </button>
                                                              <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                              </button>
                                                          </div>
                                                          <div class="review-block-title">It was a great Experience!!</div>
                                                      </div>
                                                      
  <!-- //2nd media -->
                                                       <button class="btn btn-info btn-sm second_review"><span >More..</span></button>

                                                      <div class="second_rev">
                                                          <div class="media ">
                                                            <img src="../assets/img/img/user-male.png" alt="User" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                                            <div class="media-body">
                                                              <h4>Masud Rana </h4>
                                                                      
                                                              <div >
                                                                  <div class="review-block-rate">
                                                                      <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                        <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                      </button>
                                                                      <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                        <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                      </button>
                                                                      <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                                                        <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                      </button>
                                                                      <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                        <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                      </button>
                                                                      <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                        <span class="icon ion-md-medical" aria-hidden="true"></span>
                                                                      </button>
                                                                  </div>
                                                                  <div class="review-block-title">Awesome Experience!!</div>
                                                              </div>



                                                              
                                                            </div>
                                                          </div>
                                                      </div> 
                                              
                                                    </div>
                                                  </div>
   <!-- 3rd review end  -->

         
                                            </div>
                                        </div>
                                    </div>
                                    <!--second tab-->
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-md-3 col-xs-6 "> <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">Md. Masud Rana</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6"> <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">+8801564745</p>
                                                </div>
                                                <div class="col-md-4 col-xs-6  pr-lg-0 pl-lg-0"> <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">masud15-599@diu.edu.bd</p>
                                                </div>
                                                <div class="col-md-2 col-xs-6"> <strong>Location</strong>
                                                    <br>
                                                    <p class="text-muted">Birulia, Savar, Dhaka.</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            
                                        </div>
                                    </div>

                                    <!--3rd tab( skill )-->
                                    <div class="tab-pane" id="skill" role="tabpanel">
                                        <div class="card-body">
                                           
                                            <div class="row justify-content-center">
                                                
                                                <div class="col-md-12">
                                                    
                                                    
                                                    <h4 style="margin: -12px 0 15px;">Skill Set</h4>
                                                    <hr>
                                                    <h5 class="m-t-30">PHP <span class="float-right">90%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                    <h5 class="m-t-30">Laravel <span class="float-right">80%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                    <h5 class="m-t-30">Wordpress <span class="float-right">80%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                    <h5 class="m-t-30">HTML 5 <span class="float-right">90%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                    <h5 class="m-t-30">jQuery <span class="float-right">50%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                    <h5 class="m-t-30">Photoshop <span class="float-right">70%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material">
                                                <div class="form-group">
                                                    <label class="col-md-12">Full Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">Email</label>
                                                    <div class="col-md-12">
                                                        <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Password</label>
                                                    <div class="col-md-12">
                                                        <input type="password" value="password" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Phone No</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Message</label>
                                                    <div class="col-md-12">
                                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12">Select Country</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line">
                                                            <option>London</option>
                                                            <option>India</option>
                                                            <option>Usa</option>
                                                            <option>Canada</option>
                                                            <option>Thailand</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-success">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
<!-- 
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-chart text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Number</p>
                                                <h4 class="card-title">150GB</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-refresh"></i> Update Now
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-light-3 text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Revenue</p>
                                                <h4 class="card-title">$ 1,345</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-calendar-o"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                    </div>  -->                                      
                </div>
            </div>


















            <!-- content section end -->















</div> {{-- content-body end --}}

@endsection

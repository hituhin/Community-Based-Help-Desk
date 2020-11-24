<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CBHD</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets2/css/light-bootstrap.css') }}" rel="stylesheet" />

    
    <style>
        .navbar .navbar-nav .nav-item .nav-link:hover {
                color: #2C6CF6;
        }
    </style>
</head>
<body>
    <div class="wrapper">
          <!-- Main Panel Start -->     
            <div class="main-panel-front">








                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
        
                            <a class="navbar-brand" href="#"> <img alt="branding logo" src="{{ asset('app-assets/images/logo/cbhd.png') }}"class="brand-logo" style="width: 135%;"></a>
                        </div>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                
                                <li class=" nav-item">
                                    <a href="/login" class="nav-link">
                                        Login
                                    </a>
                                </li>

                                <li class=" nav-item">
                                    <a href="/register" class="nav-link">
                                        Register
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <!-- content section start -->
                <div class="content">
                    <div class="container">


                    @yield('content')




                        
                            
                                 
                             
                            
                                                                
                    </div>
                </div>
                <!-- content section end -->
                <!-- footer section start -->
                <footer class="footer">
                    <hr>
                    <div class="container">
                        <nav>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Forum
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Terms and Conditions
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright text-center">
                                © 2019
                                
                                <a href="#">CBHD</a>, All Rights Reserved.
                            </p>
                        </nav>
                    </div>
                </footer>
                <!-- footer section end -->

            </div>
            <!-- Main Panel end --> 
     </div>
     <!-- end wrapper --> 
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets2/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

</html>

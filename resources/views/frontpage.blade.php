<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="/frontpage/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontpage/css/bootstrap.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="/frontpage/css/style.css">
    <title>Community Based Help Desk</title>
    <style>

        footer#gtco-footer {
            width: 105%;
            margin-left: -28px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav" id="home">
    <div class="container"><a href="/" class="navbar-brand"><img src="/frontpage/images/cbhd.png" alt="" style="width: 210px !important;display: block;height: 54px;"></a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="#purpose">Purpose</a></li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">



                @guest
                        <a href="{{route('login')}}" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">login</a> 
                    @if (Route::has('register'))
                            <a href="{{route('register')}}" class="btn btn-info my-2 my-sm-0 text-uppercase">register
                </a>
                    @endif
                @else
                    
                            
                       
                            {{-- <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="btn btn-info my-2 my-sm-0 text-uppercase">Logout </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                     
                @endguest

                
                
            </form>
        </div>
    </div>
</nav>
<div class="container gtco-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Alone we can do so little; <span>together</span> we can do so much.</h1> <span>– Helen Keller</span>
                <p>Community-Based Help Desk (CBHD) is a platform for knowledge sharing.</p>
                <a href="{{route('login')}}">Get started <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
            <div class="col-md-6">
                <div class="card"><img class="card-img-top img" src="/frontpage/images/banner-img.png" alt=""></div>
            </div>
        </div>
    </div>
</div>




<div class="container gtco-feature" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="card">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="/frontpage/images/g2.jpg" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> Community Based Help Desk
                    is a learning zone. </h2>
                <p> A community-based help desk is a web-based learning method and strategy that engages with learning, Learners collaborate with each other and work together to solve problems, complete a task, or create something special. </p>
                <p>
                    <small>As per the general education system of the country, we have lacked some concentration in our class session.
                    </small>
                </p>
                <a href="{{route('register')}}">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>






<div class="container gtco-features" id="skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2> Explore The Skills Help <br/>Provider offer for you </h2>
                <p> Help providers are always offer you their best to solve your problem. You can a meeting wih a help provider. You can also make discussion on the forum.</p>
                <a href="{{route('register')}}">Join Now <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div class="col-lg-8">
                <svg id="bg-services"
                     width="100%"
                     viewBox="0 0 1000 800">
                    <defs>
                        <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                            <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                            <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                        </linearGradient>
                    </defs>
                    <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)"
                          d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z"/>
                </svg>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="/frontpage/images/web-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Web Development</h3>
                                <!-- <p class="card-text">Nullam quis libero in lorem accumsan sodales. Nam vel nisi
                                    eget.</p> -->
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="/frontpage/images/marketing.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Problem Solving</h3>
                                <!-- <p class="card-text">Nullam quis libero in lorem accumsan sodales. Nam vel nisi
                                    eget.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="/frontpage/images/seo.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Data Mining</h3>
                                <!-- <p class="card-text">Nullam quis libero in lorem accumsan sodales. Nam vel nisi
                                    eget.</p> -->
                            </div>
                        </div>
                        <div class="card text-center">
                            <div class="oval"><img class="card-img-top" src="/frontpage/images/graphics-design.png" alt=""></div>
                            <div class="card-body">
                                <h3 class="card-title">Algorithm</h3>
                                <!-- <p class="card-text">Nullam quis libero in lorem accumsan sodales. Nam vel nisi -->
                                    <!-- eget.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container gtco-feature" id="purpose">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="card">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="/frontpage/images/learn-img.jpg" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> Purpose of Community Based Help Desk </h2>
                <p> The main objectives of CBHD are building a strong community, those are interested to help each other and gather knowledge by a collaboration method. This document helps us to gather a basic concept, how we construct and design our help desk by creating and using a strong community. </p>
                <p>
                    <small>Help us to find out how we can solve our day to day life problems by using the power of learner’s community.
                    </small>
                </p>
                <!-- <a href="#">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div> -->
        </div>
    </div>
</div>






<div class="container gtco-numbers-block">
    <div class="container">
        <svg width="100%" viewBox="0 0 1600 400">
            <defs>
                <linearGradient id="PSgrad_03" x1="80.279%" x2="0%"  y2="0%">
                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />

                </linearGradient>

            </defs>
            <!-- <clipPath id="clip-path3">

                                      </clipPath> -->

            <path fill-rule="evenodd"  fill="url(#PSgrad_03)"
                  d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>

            <clipPath id="ctm" fill="none">
                <path
                        d="M98.891,386.002 L1527.942,380.805 C1581.806,380.610 1599.093,335.367 1570.005,284.353 L1480.254,126.948 C1458.704,89.153 1408.314,59.820 1366.025,57.550 L298.504,0.261 C238.784,-2.944 166.619,25.419 138.312,70.265 L16.944,262.546 C-24.214,327.750 12.103,386.317 98.891,386.002 Z"></path>
            </clipPath>

            <!-- xlink:href for modern browsers, src for IE8- -->
            <image  clip-path="url(#ctm)" xlink:href="/frontpage/images/word-map.png" height="800px" width="100%" class="svg__image">

            </image>

        </svg>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">33</h5>
                        <p class="card-text">Active Meetings</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">65</h5>
                        <p class="card-text">Solved Discussions</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">80</h5>
                        <p class="card-text">Completed Meetings</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">131</h5>
                        <p class="card-text">Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<footer  id="gtco-footer" style="background: -webkit-linear-gradient(0deg, #06c6f9 0%, #38eaf9 100%);padding: 15px 0;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                        <p style="color: #fff;margin: 0;">&copy; 2019 CBHD, All Rights Reserved.</p>

            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/frontpage/js/jquery-3.3.1.slim.min.js"></script>
<script src="/frontpage/js/popper.min.js"></script>
<script src="/frontpage/js/bootstrap.min.js"></script>
<!-- owl carousel js-->
<script src="/frontpage/js/main.js"></script>
</body>
</html>

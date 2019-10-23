<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css"> -->


    <link rel="stylesheet" href="{{asset('/')}}front/css/shop.css"  />

    <link rel="stylesheet"  href="{{asset('/')}}front/css/jquery-ui1.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/flexslider.css" />
    <link rel="stylesheet" href="{{asset('/')}}front/css/checkout.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/creditly.css">

    <link rel="stylesheet" href="{{asset('/')}}front/css/easy-responsive-tabs.css">
  

    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.theme.default.min.css">
     <!-- <link rel="stylesheet" href="{{asset('/')}}front/css/animation.css"> -->


    <!--stylesheets-->
    <link rel="stylesheet"  href="{{asset('/')}}front/style.css">
    @stack('css')
  <title>Online Shop in Bangladesh</title>
</head>

<body>
    <!-- header top start -->
    <section id="header_top">
        <div class="header_t">
            <div class="row">
                <div class="col-md-3 col-sm-3 mt-2">
                    <i class="fas fa-phone" style="color:#fff ; font-size:14px"></i>
                    <span style="color: #ef6e46;font-size: 15px; padding-left:5px">
                        ০৯৬৩৮০০০৭৭৭
                    </span>


                </div>
                <div class="col-md-9 col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">আবেদীনবাজারে সেল করুন <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">পরামর্শ/অভিযোগ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">&nbsp;&nbsp;<font style='color:#febe10'>
                                            <img src="{{asset('/')}}front/images/topordertrack.png" alt="">
                                            ডেলিভারি ট্র্যাক করুন</font></a>
                                </li>



                                <li class="nav-item dropdown" style="border:none;">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-alt"></i> আপনার অ্যাকাউন্ট
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <form>

                                            <input type="text" placeholder="ইমেইল অ্যাড্রেস" class="form-control">
                                            <input type="text" placeholder="পাসওয়ার্ড" class="form-control">
                                            <br>
                                            <center>
                                                <input type="submit" value="লগইন করুন" class="btn btn-primary pt-2">

                                            </center>

                                        </form>
                                        <a class="dropdown-item" href="#" class="text-left">পাসওয়ার্ড ভুলে গেছেন?</a>
                                        <a class="dropdown-item" href="#">রেজিস্টার</a>
                                        <a class="dropdown-item" href="#">রিফান্ড পলিসি</a>
                                        <a class="dropdown-item" href="#">অর্ডার দেয়ার নিয়ম</a>



                                </li>

                            </ul>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary bg-light text-dark">BNG</button>
                                <button type="button" class="btn btn-secondary">ENG
                                </button>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>



    <!-- header top end -->


    <!-- header middle start -->

    <section id="header_middle">
        <div class="header_m">
            <div class="row">
                <div class="col-lg-2  col-md-2col-sm-6  col-xs-12" id="logo">
                    <a href="index.php">
                        <img src="{{asset('/')}}front/images/logo34.png" alt="" width="190" height="100">


                    </a>
                </div>
                <div class="col-md-8 col-sm-6  col-xs-12" id="serch_box">
                    <form>
                        <div class="input-group mb-3">



                            <div class="input-group" style="border: 1px solid #35A3D3">
                                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">

                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-search text-grey" aria-hidden="true"></i></button> </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">সকল</a>
                                        <a class="dropdown-item" href="#">প্রোডাক্ট</a>
                                        <a class="dropdown-item" href="#">মার্চেন্ট</a>

                                    </div>

                                </div>
                            </div>

                    </form>





                    <div id="popular_search">
                    <nav class="navbar navbar-expand-md navbar-light padding_0">
                      
                    <a class="navbar-brand" href="#">জনপ্রিয় অনুসন্ধান</a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Disabled</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Disabled</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Disabled</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Disabled</a>
                            </li>
                            <li class="nav-item" style="border:none;">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                       
                            </ul>
                        </div>
                    </nav>

                    </div> 
                </div>
            </div>


            <div class="col-md-2 col-sm-6 col-xs-12" id="list_img">
                <!-- <a href="#">
                    <img src="./images/list.png" alt="list image">

                    </a>
                    <a href="#">
                    <img src="./images/list-2.png" alt="list image">
                    

                    </a>
                    <a href="#">

                    <img src="./images/list-3.png" alt="list image">
                  
                    </a> -->
                <img src="{{asset('/')}}front//images/call-now.gif" alt="call now button">
                <button class="btn btn-warning btn-large text-white">
                    01716354422
                </button>
            </div>
        </div>
        </div>


    </section>
    <!-- header middle end-->
    <hr style="background:#44C9F6; margin-bottom: 0px; ">


    {{-- star nav --}}
    
    @include('fronts.incl.nav')

    {{-- close nav --}}




@yield('content')




@include('fronts.incl.footer')
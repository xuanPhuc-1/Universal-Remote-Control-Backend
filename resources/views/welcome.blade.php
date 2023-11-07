<!DOCTYPE html>
<html lang="en">

<head>
    <title>Universal IR Remote Control System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/frontend/css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="/frontend/css/animate.css" />

    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css" />

    <link rel="stylesheet" href="/frontend/css/aos.css" />

    <link rel="stylesheet" href="/frontend/css/ionicons.min.css" />

    <link rel="stylesheet" href="/frontend/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="/frontend/css/jquery.timepicker.css" />

    <link rel="stylesheet" href="/frontend/css/flaticon.css" />
    <link rel="stylesheet" href="/frontend/css/icomoon.css" />
    <link rel="stylesheet" href="/frontend/css/style.css" />
</head>

<body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Universal IR Remote Control System</a>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('admin.register'))
                            <a href="{{ route('admin.register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url(/frontend/images/tu-duc-chien.jpg)">
                <div class="overlay"></div>
            </div>

            <div class="slider-item" style="background-image: url(/frontend/images/silicon.jpg)">
                <div class="overlay"></div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over $100</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Always Fresh</h3>
                            <span>Product well package</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                style="background-image: url(/frontend/images/final-cate-ir.png)">
                                <div class="text text-center">
                                    <h2>Our system</h2>
                                    <p>Make our home smarter and smarter</p>
                                    <p><a href="#" class="btn btn-primary">More Information</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                style="background-image: url(/frontend/images/vi-mach.jpg)">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Embedded</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                style="background-image: url(/frontend/images/server.png)">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Server</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                        style="background-image: url(/frontend/images/app-mobile.jpg)">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Mobile App</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                        style="background-image: url(/frontend/images/home-application.jpg)">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Home Application</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">About Us</span>
                    <h2 class="mb-4">Our Team Member Information</h2>
                    <p>
                        K65ĐACLC1 - FET - UET - VNU
                    </p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap pb-5" style="margin-left: 8px; margin-right: 10px">
                                <div class="user-img mb-5" style="background-image: url(/frontend/images/duc-le.png)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">
                                        Job Details....
                                    </p>
                                    <p class="name">Le Duc</p>
                                    <span class="position">Embedded</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-5" style="margin-left: 8px; margin-right: 10px">
                                <div class="user-img mb-5"
                                    style="background-image: url(/frontend/images/tu-testing.JPG)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">
                                        Job Details....
                                    </p>
                                    <p class="name">Nguyen Huy Tu</p>
                                    <span class="position">Server</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-5" style="margin-left: 8px; margin-right: 10px">
                                <div class="user-img mb-5"
                                    style="background-image: url(/frontend/images/phuc-ngo.png)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">
                                        Job Details....
                                    </p>
                                    <p class="name">Ngo Le Xuan Phuc</p>
                                    <span class="position">Server</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-testimony owl-carousel" style="margin-left: 17%">
                        <div class="item">
                            <div class="testimony-wrap pb-5" style="margin-left: 8px; margin-right: 10px">
                                <div class="user-img mb-5"
                                    style="background-image: url(/frontend/images/nga-nguyen.png)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">
                                        Job Details....
                                    </p>
                                    <p class="name">Phuong Nga Nguyen</p>
                                    <span class="position">Mobile App</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-5" style="margin-left: 8px; margin-right: 10px">
                                <div class="user-img mb-5"
                                    style="background-image: url(/frontend/images/trieu-dan.png)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">
                                        Job Details....
                                    </p>
                                    <p class="name">Dinh Trieu Dan</p>
                                    <span class="position">Mobile App</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr />

    <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="/frontend/images/partner-1.png" class="img-fluid"
                            alt="Colorlib Template" /></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="/frontend/images/partner-2.png" class="img-fluid"
                            alt="Colorlib Template" /></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="/frontend/images/partner-3.png" class="img-fluid"
                            alt="Colorlib Template" /></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="/frontend/images/partner-4.png" class="img-fluid"
                            alt="Colorlib Template" /></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="/frontend/images/partner-5.png" class="img-fluid"
                            alt="Colorlib Template" /></a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px" class="mb-0">
                        Subcribe to our Newsletter
                    </h2>
                    <span>Get e-mail updates about our latest shops and special
                        offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address" />
                            <input type="submit" value="Subscribe" class="submit px-3" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel">
                            <span class="ion-ios-arrow-up"></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Universal IR Remote</h2>
                        <p>
                            Simplify your home entertainment experience
                        </p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Components</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li>
                                    <a href="#" class="py-2 d-block">Report</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 d-block">Returns &amp; Exchange</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 d-block">Terms &amp; Conditions</a>
                                </li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span><span class="text">144 Xuan Thuy, Cau
                                        Giay, Ha Noi</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-phone"></span><span class="text">+84
                                            xxx xxx xxx</span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">huytuduelist@gmail.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is customized with
                        <i class="icon-heart color-danger" aria-hidden="true"></i> by
                        <a href="https://www.facebook.com/pororo1001" target="_blank">huytuduelist</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="/frontend/js/jquery.min.js"></script>
    <script src="/frontend/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/frontend/js/popper.min.js"></script>/
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/jquery.easing.1.3.js"></script>
    <script src="/frontend/js/jquery.waypoints.min.js"></script>
    <script src="/frontend/js/jquery.stellar.min.js"></script>
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/js/aos.js"></script>
    <script src="/frontend/js/jquery.animateNumber.min.js"></script>
    <script src="/frontend/js/bootstrap-datepicker.js"></script>
    <script src="/frontend/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/frontend/js/google-map.js"></script>
    <script src="/frontend/js/main.js"></script>
</body>

</html>

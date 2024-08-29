<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MK Health Care Pathology Lab - Budget-friendly Test at Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    @vite(['resources/sass/app.scss', 'resources/css/bootstrap.min.css', 'resources/css/style.css', 'resources/css/responsive.css', 'resources/css/custom.css', 'resources/lib/animate/animate.min.css', 'resources/lib/owlcarousel/assets/owl.carousel.min.css', 'resources/lib/owlcarousel/assets/owl.theme.green.css'])

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-accent py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3 text-white"><i class="fa fa-map-marker-alt me-2"></i>Matoshri Complex, Mukta
                        Nagar, Beside ICICI Bank,
                        Padmanabhpur Road, Maharaja Chowk, Durg (C.G.) - 491001</small>
                    <small class="me-3 text-white"><i class="fa fa-clock me-2"></i>Mon-Sat 09am-5pm, Sun Closed</small>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Brand Start -->
    <div class="container-fluid bg-white text-primary pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">

                    <div class="ms-3">
                        <h5 class="text-dark mb-0 fs-2">Give Us A Call</h5>
                        <span><a href="tel:+916268933691"><i class="text-dark fa fa-phone-alt me-2"></i>+91 6268 933
                                691</a></span>
                        <br>
                        <span><i class="text-dark fa fa-envelope me-2"></i>support@mkhealthcare.com</span>
                        {{-- <span><a href="tel:+918827440557">+91 8827440557</a></span> |
                        <span><a href="tel:07884217599">0788-4217599</a></span> --}}
                    </div>
                </div>
                <!-- <a href="index.html" class="h1 text-primary mb-0">Lab<span class="text-dark">sky</span></a> -->
                <a href="{{ route('home') }}" class="h1 text-primary mb-0"><img
                        src={{ asset('assets/img/logo_trans.png') }} width="300" alt=""></a>
                <div class="d-flex">
                    <div class="ms-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3 ">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <button type="button" class="navbar-toggler me-0 text-accent pt-3" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        {{-- <span class="navbar-toggler-icon"></span> --}}
                        <svg class="bi bi-list text-accent" width="1em" height="1em" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                    <a href="index.html" class="navbar-brand lg-none">
                        <h1 class="text-primary m-0"><img src={{ asset('assets/img/logo_trans.png') }} width="140"
                                alt=""></h1>
                        <!-- <h1 class="text-primary m-0">Lab<span class="text-dark">sky</span></h1> -->
                    </a>
                </div>

                <div class="d-flex d-lg-none flex-row justify-content-between align-items-center">

                    <a href="https://wa.me/+919581016768" class="  text-white font-bold  mt-4 ml-2 p-1 rounded-pill"
                        style="background-color: #efefef; width: 30px; height:30px;" target="_blank">
                        <img class='w-100 mb-1' src="{{ asset('assets/img/whatsapp_outline.png') }}"
                            alt="whatsapp-icon">
                    </a>
                    <div style="visibility: hidden;"> O</div>
                    <a class="p-1 mr-2  mt-4 rounded-circle" href="tel:8827440557"
                        style="background-color: #efefef; width: 30px; height:30px;">
                        {{-- <i class="bi bi-telephone-inbound fs-2"></i> --}}
                        <img class="w-100 mb-1" src="{{ asset('assets/img/phone.png') }}" alt="whatsapp-icon">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('home') }}"
                            class="nav-item  nav-link {{ request()->routeIs('home') ? 'active' : '' }} px-4 ">Home</a>
                        <a href="{{ route('test') }}"
                            class="nav-item  nav-link {{ request()->routeIs('test') ? 'active' : '' }} px-4">Tests</a>

                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link  px-4 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        @if (auth()->check() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin') }}"
                                class="nav-item nav-link  px-4 {{ request()->routeIs('admin') ? 'active' : '' }}">Admin</a>
                        @elseif (auth()->check() && auth()->user()->hasRole('patient'))
                            <a href="{{ route('patient.dashboard') }}"
                                class="nav-item nav-link  px-4 {{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">Patient</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="nav-item nav-link  px-4 {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                            <a href="{{ route('register') }}"
                                class="nav-item nav-link  px-4 {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
                        @endif

                    </div>
                    <div class="ms-auto d-none d-lg-flex align-items-center">
                        <x-cart-button />

                        <a class="btn btn-sm-square btn-dark ms-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-dark ms-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-dark ms-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm-square btn-dark ms-2" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <x-bootstrap-alerts />

    {{ $slot }}

    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.html" class="navbar-brand ">
                        <div class="h-15 text-primary mb-0 ">
                            <div class="bg-white " style="width:fit-content; padding: 10px;"><img
                                    src={{ asset('assets/img/logo.jpg') }} width="300" alt=""></div>
                        </div>
                    </a>
                    <p class="fs-5 mb-4 text-white">At MKHealthcare, we’re all about caring for you and your health.
                        Our friendly team is here to offer personalized care and the latest treatments to help you feel
                        your best. Your well-being is our top priority, and we’re here to support you every step of the
                        way.</p>
                    <p><i class="fa fa-map-marker-alt me-2"></i>Matoshri Complex, Mukta Nagar, Beside ICICI Bank, <br>
                        Padmanabhpur Road, Maharaja Chowk, Durg (C.G.) - 491001</p>
                    <p class="footer-phone-link"><i class="fa fa-phone-alt me-2"></i><a
                            href="tel:07884217599">0788-4217599</a> | <a href="tel:+916268933691">+91 6268 933 691</a>
                        | <a href="tel:+918827440557">+91 8827440557</a>
                    <p>

                        <!-- <p><i class="fa fa-envelope me-2"></i>info@example.com</p> -->
                    <div class="d-flex mt-4">
                        <a class="btn btn-lg-square btn-accent me-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-accent me-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-accent me-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg-square btn-accent me-2" href="#"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Quick Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Popular Links</h4>
                            <a class="btn btn-link" href="">About Us</a>
                            <a class="btn btn-link" href="">Contact Us</a>
                            <a class="btn btn-link" href="">Our Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="text-light mb-4">Newsletter</h4>
                            <div class="w-100">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 py-3 px-4"
                                        style="background: rgba(255, 255, 255, .1);"
                                        placeholder="Your Email Address"><button class="btn btn-accent px-4">Sign
                                        Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Whatsapp Button -->
    <a href="https://wa.me/+919581016768" class="  text-white font-bold py-1 px-2"
        style="background-color: #32D851;width: fit-content; position: fixed;border-radius: 10px; bottom: 20px; left: 20px;"
        target="_blank">
        <img src="{{ asset('assets/img/wp.png') }}" alt="whatsapp-icon" width="40">
        Chat On Whatsapp
    </a>
    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-accent text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="#">MK Pathology Lab</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <p class="mb-0">Designed by <a href="https://pathideamultiskill.com">Path Idea Multiskill</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
</body>
<style>
    .owl-theme .owl-nav [class*=owl-] {
        padding: 10px 15px;
        background-color: darkblue;
    }

    .owl-theme .owl-nav [class*=owl-]:hover {
        background-color: orange;

    }

    .owl-theme .owl-nav {
        position: absolute;
        top: -30%;
        left: 93%;
        white-space: nowrap;

    }

    @media (max-width: 768px) {
        .owl-theme .owl-nav {
            left: 85%;
            transform: translateX(-50%);
        }
    }

    .owl-prev i,
    .owl-next i {
        /* transform: scale(1, 6); */
        color: #fff;
        background-color: ;
    }
</style>
@vite(['resources/js/app.js', 'resources/js/main.js', 'resources/lib/easing/easing.min.js', 'resources/lib/owlcarousel/owl.carousel.min.js'])
{{-- @vite('resources/lib/wow/wow.min.js'); --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        $(document).ready(function() {

            var $wrapper = $('.health-package-mobile ');

            $wrapper.owlCarousel({
                items: 1, // or however many items you want
                loop: true,
                margin: 10,
                nav: true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                dots: false,
                autoplay: false,
                // autoplayTimeout: 3000,
                // autoplayHoverPause: true,
                smartSpeed: 450, // Speed of the smart transition in milliseconds.
                fluidSpeed: 450, // Speed of the slide transition when dragging.
                responsive: {

                    0: {
                        items: 1.1,
                    },
                    450: {
                        items: 1,
                    },
                    750: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                        margin: 10,
                    },
                    1200: {
                        items: 3,
                        margin: 20,
                    }
                },
            });

            var $frequently_booked_test = $('#frequently_booked_test');
            var $package_images = $('#package-images');

            $package_images.owlCarousel({
                loop: true,
                margin: 10, // Adjust if necessary
                nav: true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                center: true,
                dots: false,
                dotsEach: false,
                autoplay: false,
                // autoplayTimeout: 3000,
                // autoplayHoverPause: true,
                smartSpeed: 450,
                fluidSpeed: 450,
                responsive: {

                    0: {
                        items: 1.1,
                    },
                    450: {
                        items: 1.1,
                    },
                    750: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                        margin: 10,
                    },
                    1200: {
                        items: 3,
                        margin: 10,
                    }
                },
            });

            $frequently_booked_test.owlCarousel({
                loop: true,
                margin: 1, // Adjust if necessary
                nav: false,
                dots: true,
                mergeFit: true,
                dotsEach: false,
                autoplay: false,
                // autoplayTimeout: 3000,
                // autoplayHoverPause: true,
                smartSpeed: 450,
                fluidSpeed: 450,
                merge: true,
                responsive: {

                    0: {
                        items: 1.2,
                    },
                    450: {
                        items: 2,
                    },
                    750: {
                        items: 3,
                    },
                    1000: {
                        items: 4,
                        margin: 10,
                    },
                    1200: {
                        items: 5,
                        margin: 10,
                    }
                },
                responsiveRefreshRate: 100
            });


        });
    })
</script>

</html>

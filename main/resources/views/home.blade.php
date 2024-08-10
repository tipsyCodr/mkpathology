<x-guest>
    @if (session('status'))
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('status') }}",
                })
            });
        </script>
    @endif
    <!-- Carousel Form Start -->

    <div
        class="container position-absolute d-md-none d-lg-block bg-white  rounded-md test-form p-0  top-40 to p-xl-40 top-lg-20 top-sm-10  left-10 left-sm-1">
        @auth
            <h1 class="p-2">Book Now</h1>
        @endauth
        <x-book-form></x-book-form>

    </div>
    <!-- Carousel Form  end -->

    {{-- Mobile search bar --}}

    <div class="container-fluid m-0 p-3 d-lg-none d-sm-block">
        <form class="d-flex flex-column " onfocus="showlist();" onblur="hidelist();">
            <input id=searchInput class="  form-control me-2 border border-muted" style="border-radius: 10px"
                type="search" placeholder="&#128270; Search Packages and Tests" aria-label="Search"
                onkeyup="searchAll();">
            {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            <div id='searchListOverlay' class='p-2 mt-2 ' style="border-radius: 20px;">
                <ul id='searchList' class='list-none fixed ' style=" list-style:none; padding:0;">

                </ul>
            </div>
        </form>
        <div class="d-flex flex-row">
            <a href ="{{ route('patient.prescription.view') }}"
                class='w-100 border border-muted mx-2 px-2 py-4 text-center  ' style="border-radius:10px; ">
                <span class=" text-white p-2 rounded-circle"
                    style='width: 5px; height: 5px; background-color: rgb(156, 156, 228)'><i
                        class="bi bi-upload text-white"></i></span>
                <br>
                <p class='my-2'> Upload
                    Prescription</p>
            </a>
            <a href ="{{ route('patient.reports') }}" class='w-100 border border-muted mx-2 px-3 py-4 text-center  '
                style="border-radius:10px;">
                <span class=" text-white p-2 rounded-circle"
                    style=' width: 10px; height: 10px; background-color: rgb(156, 228, 185)'><i
                        class="bi bi-clipboard-data text-white"></i></span>
                <br>
                <p class='my-2'>Reports</p>
            </a>

        </div>
    </div>

    {{-- Mobile search bar end --}}




    <!-- Carousel Start -->

    <div class="container-fluid header-carousel px-0 flex-row d-none d-lg-block">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 660px;">
                    <img class="w-100 fit-image" src={{ asset('assets/img/carousel/1.jpg') }} alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <!-- <h1 class="display-1 text-white animated slideInRight mb-3">Award Winning Laboratory Center</h1>
                                    <p class="mb-5 animated slideInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem porttitor, malesuada arcu quis, fringilla risus.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 660px;">
                    <img class="img-fluid w-100 fit-image" src={{ asset('assets/img/carousel/2.jpg') }} alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <!-- <h1 class="display-1 text-white animated slideInLeft mb-3">Expet Doctors & Lab Assistants</h1>
                                    <p class="mb-5 animated slideInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor. Quisque vel lorem porttitor, malesuada arcu quis, fringilla risus.</p>
                                    <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Explore More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <!-- Carousel End -->

    <style>
        .hover-effect {
            /* background-color: #031b4e; */
            background-color: white;
            color: #031b4e;
        }

        .hover-text {

            color: gray;
        }

        .hover-text:hover {
            color: white;
        }

        .hover-effect:hover {
            background-color: #ff6d0a;
        }

        .hover-accent {
            background-color: #031b4e;
        }

        .hover-accent:hover {
            background-color: #ff6d0a;
        }

        .hover-effect:hover .hover-text {
            color: #ffffff;
        }
    </style>
    <!-- Bottom Navbar -->
    <style>
        /* Additional styles for the bottom navbar */
        /* Additional styles for the bottom navbar */

        .overflow-hidden {
            overflow-x: hidden;
            width: 100vw;
        }

        .bottom-link {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80px;
        }

        .navbar .nav-link {
            color: white;
            text-align: center;
            flex: 1;
        }

        .navbar .nav-link i {
            font-size: 24px;
        }

        .navbar .nav-link div {
            font-size: 12px;
        }

        .fade-in-up {
            animation-name: fadeInUp;
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }
    </style>
    <!-- Bottom Navbar -->
    <nav class="navbar fixed-bottom navbar-dark bg-light d-md-none overflow-hidden">
        <div class="container d-flex justify-content-between">
            <a class="nav-link bottom-link text-center hover-effect" href="{{ route('book') }}">
                <i class="bi bi-journal-medical hover-text"></i>
                <div class=" hover-text pt-0 ">Book a Test</div>
            </a>
            <a class="nav-link bottom-link text-center hover-effect" href="{{ route('patient.prescription.view') }}">
                <i class="fas fa-file-upload hover-text"></i>
                <div class="hover-text pt-2">Upload Prescriptions</div>
            </a>
            <a class="nav-link bottom-link text-center hover-effect" href="{{ route('login') }}">
                <i class="fas fa-file-download hover-text"></i>
                <div class="hover-text pt-2">Download Reports</div>
            </a>
        </div>
    </nav>

    <!-- Bottom Navbar  end -->

    <!-- Banner Start -->
    <div class="container-fluid banner mb-1 d-none d-lg-block">
        <div class="container">
            <div class="row gx-0">
                <div class=" col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class=" hover-accent d-flex  flex-column p-5 " style="height: 300px">
                        <h3 class="text-white text-center mb-3">Book a Test</h3>
                        <a href="{{ route('book') }}"><img class='icon' src={{ asset('assets/img/icon/test.png') }}
                                alt=""></a>
                    </div>
                </div>
                <div class=" col-lg-4 wow zoomIn " data-wow-delay="0.3s">
                    <div class="  hover-accent d-flex  flex-column p-5" style="height: 300px">
                        <h3 class="text-white text-center mb-3">Upload Prescription</h3>
                        <a href={{ route('patient.prescription.view') }}><img class='icon'
                                src={{ asset('assets/img/icon/prescription.png') }} alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn " data-wow-delay="0.6s">
                    <div class="  hover-accent d-flex flex-column p-5" style="height: 300px">
                        <h3 class="text-white text-center mb-3">Download Report</h3>
                        <a href="{{ route('login') }}"><img class='icon'
                                src={{ asset('assets/img/icon/report.png') }} alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 d-none d-lg-block">
                <div class="col-lg-12 text-center">
                    <h1 class="display-6">Comprehensive Health Solutions</h1>
                    <p class="mb-5">We offer a wide range of health packages to suit your needs. Choose from our
                        selection of packages to get the right care for you.</p>
                </div>
            </div>


            <!-- Frequently Booked  --><?php
            $frequently_booked = [
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1070/cd862c2a-0776-4332-979c-d11a46e59309.png', 'title' => 'Full Body'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/8/efa9c45e-471b-43bc-add9-707d6935798b.png', 'title' => 'Fever'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1062/ada3732a-b9e0-48d0-8679-1b93f4871a3e.png', 'title' => 'Heart'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1067/e6025409-aeb1-4f88-987b-75026750e801.png', 'title' => 'Diabetes'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1075/93db45fe-8e57-4ae1-ad5a-66ae6e8e3bc5.png', 'title' => 'Vitamin'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/36/acbe04f3-78aa-4d55-99c1-cb5f5eca8ef2.png', 'title' => 'Thyroid'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/16/582417a6-62d5-4407-8393-debaa0fe8e79.png', 'title' => 'Arthritis'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/21/15ff2632-b29e-41ab-b177-52bf405569b9.png', 'title' => 'Cancer'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/13/a531cc6d-2923-4be9-9f3e-8fb4b889dac0.png', 'title' => 'Hormone Tests'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/14/6e64f3f8-22f1-4050-8a59-3abdfc48dae1.png', 'title' => 'Allergy'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1059/abbc08e3-f5ac-41fb-8c09-33c9da36c99b.png', 'title' => 'STD'],
                ['image' => 'https://static-redcliffelabs.s3.amazonaws.com/media/category-files/1061/733b4390-d624-441a-9a5d-e1be7764040d.png', 'title' => 'Combo'],
            ];
            ?>
            <style>
                .PackagesCategories_frequent__option__j3Xr0 {
                    cursor: pointer;
                    /* height: 80px; */
                    padding: 10px 16px;
                    margin: 10px 1px;
                    gap: 20px;
                    flex-direction: row;
                    align-items: center;
                    /* width: 200px; */
                    justify-content: flex-start;
                }

                .PackagesCategories_frequent__option--icon__tovns {
                    width: 60px;
                    height: 60px;
                    place-self: center;
                    padding: 11px 7px 7px 6px;
                    background: linear-gradient(223.23deg, #fff -39.74%, #dbf5f9 94.44%);
                    border-radius: 50%;
                }

                .owl-dots {
                    overflow: hidden;
                    height: 25px;
                }
            </style>
            <div class="container-fluid py-5">
                <div class="font-weight-bolder text-dark my-2" style="font-size: 1.8rem">Frequently Booked</div>
                <div id='frequently_booked_test' class="owl-carousel owl-theme" data-wow-delay="0.1s">
                    @foreach ($frequently_booked as $package)
                        <div class="item ">
                            <a href="/test">
                                <div class="rounded-lg mx-4"
                                    style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); border-radius:10px; width: fit-content;">
                                    <div class="d-flex PackagesCategories_frequent__option__j3Xr0">
                                        <div class="PackagesCategories_frequent__option--icon__tovns">
                                            <img alt="{{ $package['title'] }}" loading="lazy" width="100"
                                                height="100" decoding="async" src="{{ $package['image'] }}"
                                                style="color: transparent; height: 100%; width: 100%;">
                                        </div>
                                        <div class="mb-0 " style="color:#000000;">
                                            {{ $package['title'] }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Frequently Booked end  -->




            <div class="row mb-4 package-test-toggle">
                <div class="col-12 d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="package-test-radio" id="package-radio"
                            autocomplete="off" checked>
                        <label class="btn btn-outline-primary rounded" for="package-radio">Packages</label>

                        <input type="radio" class="btn-check" name="package-test-radio" id="test-radio"
                            autocomplete="off">
                        <label class="btn btn-outline-primary rounded" for="test-radio">Test</label>
                    </div>
                </div>
            </div>

            <style>
                .health-package {
                    display: flex;
                }

                @media (max-width: 750px) {
                    .health-package {
                        /* display: none; */
                    }

                    .package-test-toggle {
                        display: none;
                    }
                }
            </style>

            <!-- package mobile view  -->
            <style>
                .health-package-mobile {
                    display: none;
                }

                .health-package-head {
                    display: none;
                    justify-content: center;
                    font-weight: 800;
                }

                .nowrap {
                    white-space: nowrap;
                }

                @media (max-width: 750px) {
                    .health-package-mobile .health-test-mobile {
                        display: block;
                    }

                    .card-text {
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        /* Change this number to set the number of lines */
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        width: 100%;
                        height: 50px;
                    }

                    .owl-carousel .item {
                        display: flex;
                        align-items: stretch;
                    }

                    .card {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                    }

                    .health-package-head {
                        display: flex;
                    }
                }
            </style>


            <div class="font-weight-bolder text-dark my-2 d-md-none d-sm-block" style="font-size: 1.8rem"> Top
                Packages</div>
            <div id='package-wrapper-mobile' class="owl-carousel owl-theme health-package-mobile "
                data-wow-delay="0.1s">
                @foreach ($packages as $package)
                    <div class="item">
                        <div class="card health-package-card h-100 shadow w-100">
                            <div class="p-4 card-hover">
                                <div class="d-flex justify-content-start align-items-end">
                                    <h5 class="card-title font-weight-bold" data-bs-toggle="modal"
                                        data-bs-target="#package-modal" data-id="{{ $package->id }}"
                                        onclick="getPackage({{ $package->id }})">
                                        {{ $package->name }}</h5> &nbsp;&nbsp;


                                </div>
                                <p class="card-text ">{{ $package->description }}</p>
                                <div class="collapse-hover d-flex justify-content-between align-items-end">
                                    <a class="text-primary font-weight-bold fs-4">
                                        <span>₹ </span> {{ $package->price }}
                                    </a>
                                    <a href="{{ route('package.book', $package->id) }}"
                                        class="position-relative bottom-10 btn btn-accent w-50"
                                        style="border-radius:10px;">Book<i
                                            class="bi bi-chevron-double-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- package mobile view End -->

            <!-- test mobile view start  -->
            <div class="font-weight-bolder text-dark my-2 d-md-none d-sm-block " style="font-size: 1.8rem">Top Tests
            </div>
            <div id='test-wrapper-mobile' class="owl-carousel owl-theme health-package-mobile ">
                @foreach ($tests as $test)
                    <div class="item card w-100">
                        <div class="p-4 card-hover">
                            <div class=" mb-4">
                                <i class="{{ $test->icon }} text-dark"></i>
                            </div>
                            <div class="d-flex justify-content-start align-items-start">

                                <h5 class="mb-3 card-title" data-bs-toggle="modal" data-bs-target="#test-modal"
                                    data-id="{{ $test->id }}" onclick="getTest('{{ $test->id }}')">
                                    {{ $test->name }}</h4> &nbsp;&nbsp;&nbsp;

                            </div>
                            <small class="text-muted card-text">{{ $test->description }} </small>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-primary fs-3"><b>₹ {{ $test->price }}</b></p>
                                <a class="btn btn-accent px-3 w-50"style="border-radius:10px;"
                                    href="{{ route('test.view.select', $test->id) }}">Book<i
                                        class="bi bi-chevron-double-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- test mobile view end  -->




            {{-- desktop version package  --}}

            <div id='package-wrapper' class="row g-4 gx-0 health-package">
                @foreach ($packages as $package)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-offset="0">
                        <div class="card health-package-card h-100 shadow">
                            <div class="card-header">
                                <img class='w-100'
                                    src="{{ asset('assets/img/packages') . '/' . $package->package_photo_url }}"
                                    alt="">
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h5 class="card-title font-weight-bold" data-bs-toggle="modal"
                                        data-bs-target="#package-modal" data-id="{{ $package->id }}"
                                        onclick="getPackage({{ $package->id }})">{{ $package->name }}</h5>
                                    <a class="font-weight-bold text-accent">₹{{ $package->price }}</a>
                                </div>

                                <div class="">

                                    {{-- @dd($package->tests) --}}
                                    @php
                                        $testNames = [];
                                        if (!empty($package->test_id)) {
                                            $testIds = json_decode($package->test_id, true);
                                            foreach ($testIds as $testId) {
                                                $test = App\Models\Test::find($testId);
                                                if ($test) {
                                                    $testNames[] = $test->name;
                                                }
                                            }
                                        }
                                    @endphp
                                    <b class="text-accent fs-6 ">{{ count($testNames) }} Tests</b>
                                </div>

                                <p class="card-text text-dark">{{ $package->description }}</p>

                                <style>
                                    .collapse-content {
                                        display: none;
                                    }

                                    .collapse-hover:hover>.collapse-content {
                                        display: block;
                                    }
                                </style>

                                {{-- <div class="">
                                    <b>Tests Included:</b>
                                    <ul class="list-unstyled "> --}}
                                {{-- @dd($package->tests) --}}
                                {{-- @php
                                            $testNames = [];
                                            if (!empty($package->test_id)) {
                                                $testIds = json_decode($package->test_id, true);
                                                foreach ($testIds as $testId) {
                                                    $test = App\Models\Test::find($testId);
                                                    if ($test) {
                                                        $testNames[] = $test->name;
                                                    }
                                                }
                                            } --}}
                                {{-- @endphp
                                @foreach ($testNames as $testName)
                                    <li>{{ $testName }}</li>
                                @endforeach
                                @foreach ($package->tests as $test)
                                    <li>{{ $test->name }}</li>
                                @endforeach --}}
                                {{-- </ul>
                            </div> --}}
                            </div>
                            <a href="{{ route('package.book', $package->id) }}"
                                class="position-relative bottom-10 btn btn-accent">Book
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
            {{-- desktop version for package ends --}}

            {{-- desktop version for Tests --}}
            <div id="test-wrapper" class="d-none health-test-mobile">
                <h2>All Tests</h2>
                <div class="">
                    <input class='form-control m-4' placeholder="Search Test Here...." type="text" name="search"
                        id="searchInput" onkeyup="searchTest();">
                </div>
                <div class="row g-4">
                    @foreach ($tests as $test)
                        <div class="col-lg-3 col-md-6 o-">
                            <div class="p-2 shadow card-hover">

                                <div class="d-flex flex-row justify-content-between">
                                    <h5 class="mb-3 text-accent" data-bs-toggle="modal" data-bs-target="#test-modal"
                                        data-id="{{ $test->id }}" onclick="getTest('{{ $test->id }}')"
                                        style='height: 65px;'>
                                        {{ $test->name }}</h5>
                                    <p class="text-dark"><b style='white-space: nowrap;'>₹ {{ $test->price }}</b>
                                    </p>
                                </div>
                                <h3 class="fs-6 text-dark">Description</h3>
                                <p class="text-black" style='height: 48px;'>{{ $test->description }} </p>
                                <a class="btn btn-block btn-accent w-100"
                                    href="{{ route('test.view.select', $test->id) }}">Book<i
                                        class="bi bi-chevron-double-right ms-1"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <script>
                        var delay = (function() {
                            var timer = 0;
                            return function(callback, ms) {
                                clearTimeout(timer);
                                timer = setTimeout(callback, ms);
                            };
                        })();

                        function searchTest() {
                            delay(function() {
                                const searchInput = document.getElementById('searchInput');
                                const searchText = searchInput.value.toLowerCase();
                                $.ajax({
                                    url: '{{ route('test.search') }}',
                                    type: 'GET',
                                    data: {
                                        search: searchText
                                    },
                                    success: function(data) {
                                        var target = $('#searchInput').closest('div').siblings('div.row.g-4');
                                        target.empty();
                                        data.forEach(function(test) {
                                            target.append(`
                                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="${test.index * 0.1}s">
                                                <div class="service-item">
                                                    <div class="icon-box-primary mb-4">
                                                        <i class="${test.icon} text-dark"></i>
                                                    </div>
                                                    <h5 class="mb-3">${test.name}</h5>
                                                        <small class="text-muted">${test.description} </small>
                                                        <p class="text-primary"><b>₹ ${test.price}</b></p>
                                                        <a class="btn btn-primary px-3" href="${test.url}">Add<i
                                                                class="bi bi-chevron-double-right ms-1"></i></a>
                                                </div>
                                            </div>
                                        `);
                                        });
                                    }
                                });
                            }, 500);
                        }
                    </script>

                </div>
            </div>
            <!-- test desktop view end  -->

        </div>
    </div>
    <!-- About End -->

    {{-- Modals --}}


    <style>
        .ProductDetailInstructions_homeCollection__c8urV {
            margin: 0 0 20px 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            flex-direction: row;
            font-size: 15px;
            font-style: normal;
            font-weight: 500;
            color: #2f3032;
            text-transform: capitalize;
            background: linear-gradient(90deg, rgba(219, 245, 249, .75), hsla(0, 0%, 100%, .75));
            border-radius: 10px;
            padding: 8px;
        }

        .ProductDetailInstructions_product__instructions__YlmoF {
            display: flex;
            column-gap: 10px;
            justify-content: flex-start;
            align-items: center;
            width: 90%;
            margin: 20px auto 30px;
            scroll-behavior: smooth;
            white-space: nowrap;
        }

        .ProductDetailInstructions_product__instructions__box__6ZaNF {
            border: 1px solid #d9d9d9;
            border-radius: 15px;
            padding: 12px 16px;
            display: flex;
            flex-direction: column;
            flex: 1 1;
        }

        .ProductDetailInstructions_product__instructions__box__fastingDur__mDNMM {
            font-weight: 500;
            font-size: 14px;
            line-height: 21px;
            color: #000;
        }
    </style>
    <!-- Package Modal -->
    <div class="modal fade-in-up" id="package-modal" data-bs-backdrop="static" data-bs-keyboard="true"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="bottom:-30px; top:initial;">
        <div class="modal-dialog modal-dialog-scrollable d-flex align-items-end">
            <div class="modal-content mb-4" style="border-top-left-radius: 25px;border-top-right-radius: 25px;">
                <div class="modal-header">
                    @for ($i = 0; $i < 1; $i++)
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-row justify-content-between my-2">
                        <h5 class="modal-title fs-2 package_name text-accent" id="staticBackdropLabel">
                            {{ $package->name }}</h5>
                        <p class="text-dark font-weight-bold fs-5 package_price nowrap">
                            ₹{{ $package->price }}</p> </br>

                    </div>

                    <img class="w-100 py-2 package_photo_url" src="" alt="Jaanch Infertility Profile" />
                    <div class="package-detail-instructions">
                        <div class="ProductDetailInstructions_product__instructions__YlmoF">
                            <div class="ProductDetailInstructions_product__instructions__box__6ZaNF undefined"><span
                                    class="ProductDetailInstructions_product__instructions__box__heading__DzWSr">Fasting</span><span
                                    class="ProductDetailInstructions_product__instructions__box__fastingDur__mDNMM">10-12
                                    Hrs Required</span></div>
                            <div class="ProductDetailInstructions_product__instructions__box__6ZaNF undefined"><span
                                    class="ProductDetailInstructions_product__instructions__box__heading__DzWSr">Get
                                    reports in</span><span
                                    class="ProductDetailInstructions_product__instructions__box__fastingDur__mDNMM">12
                                    hrs</span></div>
                        </div>

                        <div class="ProductDetailInstructions_homeCollection__c8urV">
                            <img src="assets/img/icon/delivery-boy.png" alt="" class=""
                                style="height:5rem;"><span>Home Sample Collection Available </span>
                        </div>
                        <span class="fs-5 font-weight-bold text-dark">What is it for ?</span>
                        <p class="package_description text-dark">{{ $package->description }}</p>

                        <div class="">
                            <b class="fs-5 font-weight-bold text-dark">Tests Included:</b>
                            <ul class="list-unstyled ">
                                {{-- @dd($package->tests) --}}
                                @php
                                    $testNames = [];
                                    if (!empty($package->test_id)) {
                                        $testIds = json_decode($package->test_id, true);
                                        foreach ($testIds as $testId) {
                                            $test = App\Models\Test::find($testId);
                                            if ($test) {
                                                $parameters = []; // Initialize parameters array
                                                if (!empty($test->parameter_id)) {
                                                    $parameterIds = json_decode($test->parameter_id, true);
                                                    foreach ($parameterIds as $parameterId) {
                                                        $parameter = App\Models\Parameter::find($parameterId);
                                                        if ($parameter) {
                                                            $parameters[] = $parameter->name;
                                                        }
                                                    }
                                                }
                                                $testNames[] = [
                                                    'test' => $test->name,
                                                    'parameters' => $parameters,
                                                ];
                                            }
                                        }
                                    }
                                @endphp

                                <ul class="list-unstyled">
                                    @foreach ($testNames as $index => $testName)
                                        <li class='text-accent list-none py-2'>
                                            <!-- Trigger for collapsing the parameters list -->
                                            <a class="d-block text-decoration-none text-accent hover:text-accent fs-5"
                                                data-bs-toggle="collapse"
                                                href="#collapseParameters{{ $index }}" role="button"
                                                aria-expanded="false"
                                                aria-controls="collapseParameters{{ $index }}"
                                                style="color: inherit;">
                                                {{ $testName['test'] }} <span
                                                    class="font-weight-bold">({{ count($testName['parameters']) }})</span>
                                            </a>


                                            <!-- Collapsible content -->
                                            <ul class="collapse" id="collapseParameters{{ $index }}">
                                                @foreach ($testName['parameters'] as $parameter)
                                                    <li>{{ $parameter }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                            </ul>
                        </div>
                    </div>
                </div> <!-- end of modal body  -->
                @endfor
                <div class="modal-footer">
                    <a href="{{ route('package.book', $package->id) }}"
                        class="position-relative bottom-10 btn btn-block btn-accent w-100" style="">Book<i
                            class="bi bi-chevron-double-right ms-1"></i>
                    </a>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Package Modal Ends-->

    {{-- Modal for Tests Section --}}
    <div class="modal fade-in-up " id="test-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="bottom:-35px; top:initial;">
        <div class="modal-dialog modal-dialog-scrollable d-flex align-items-end">
            <div class="modal-content mb-4" style="border-top-left-radius: 25px;border-top-right-radius: 25px;">

                @for ($i = 0; $i < 1; $i++)
                    <div class="modal-header ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="">
                            <div class=" mb-4 d-flex justify-content-between">
                                <div>
                                    <h2 class="test_name text-accent"></h2>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="text-dark fs-5 "><b class="test_price" style="white-space: nowrap;">
                                        </b></p>
                                </div>
                            </div>
                            <span class="fs-4 font-weight-bold text-dark">What is it for ?</span></br>
                            <small class="text-black test_description">{{ $test->description }} </small>

                        </div>
                    </div>
                @endfor
                <div class="modal-footer">
                    <a class="btn btn-block btn-accent px-3 w-100"
                        href="{{ route('test.view.select', $test->id) }}">Book<i
                            class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-hover {
            border-radius: 10px;
            transition: 0.2s ease-in-out;
        }

        .card-title {
            cursor: pointer;
            height: 40px
        }

        .card-text {
            height: 50px;
        }

        .card-hover:hover {
            transform: scale(1.02);
            background-color: #f5f5f5;
        }
    </style>
    {{-- Modal for Tests Section Ends --}}


    {{-- Modals --}}


    {{-- desktop version package  --}}
    <h2 class="px-2 mx-2 d-lg-none">Mostly Booked Packages</h2>
    <div id='package-wrapper' class=" px-2 my-5 mx-3 d-lg-none d-sm-block" style='height: 300px;'>
        @foreach ($packages as $package)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-wow-offset="0">
                <div class="card health-package-card h-100 shadow">
                    <div class="card-header">
                        <img class="w-100"
                            src="{{ asset('assets/img/packages') . '/' . $package->package_photo_url }}"
                            alt="Jaanch Infertility Profile" />
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="card-title font-weight-bold" data-bs-toggle="modal"
                                data-bs-target="#package-modal" data-id="{{ $package->id }}"
                                onclick="getPackage({{ $package->id }})">{{ $package->name }}</h5>
                            <a class="font-weight-bold text-accent">₹{{ $package->price }}</a>
                        </div>

                        <div class="">

                            {{-- @dd($package->tests) --}}
                            @php
                                $testNames = [];
                                if (!empty($package->test_id)) {
                                    $testIds = json_decode($package->test_id, true);
                                    foreach ($testIds as $testId) {
                                        $test = App\Models\Test::find($testId);
                                        if ($test) {
                                            $testNames[] = $test->name;
                                        }
                                    }
                                }
                            @endphp
                            <b class="text-accent fs-6 ">{{ count($testNames) }} Tests</b>
                        </div>

                        <p class="card-text text-dark">{{ $package->description }}</p>

                        <style>
                            .collapse-content {
                                display: none;
                            }

                            .collapse-hover:hover>.collapse-content {
                                display: block;
                            }
                        </style>
                    </div>
                    <a href="{{ route('package.book', $package->id) }}"
                        class="position-relative bottom-10 btn btn-accent">Book
                    </a>
                </div>
            </div>
        @endforeach


    </div>
    {{-- desktop version for package ends --}}

    {{-- desktop version for Tests --}}
    <h2 class="m-4 d-lg-none">Mostly Booked Tests</h2>
    <div id="test-wrapper" class=" px-2 my-5 mx-3 d-lg-none d-sm-block" style='height: 300px; overflow-y: scroll'>
        <div class="row g-4">
            @foreach ($tests as $test)
                <div class="col-lg-3 col-md-6 o-">
                    <div class="p-2 shadow card-hover">

                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="mb-3 text-accent" data-bs-toggle="modal" data-bs-target="#test-modal"
                                data-id="{{ $test->id }}" onclick="getTest('{{ $test->id }}')"
                                style='height: 65px;'>
                                {{ $test->name }}</h5>
                            <p class="text-dark"><b style='white-space: nowrap;'>₹ {{ $test->price }}</b>
                            </p>
                        </div>
                        <h3 class="fs-6 text-dark">Description</h3>
                        <p class="text-black" style='height: 48px;'>{{ $test->description }} </p>
                        <a class="btn btn-block btn-accent w-100"
                            href="{{ route('test.view.select', $test->id) }}">Book<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            @endforeach
            <script>
                var delay = (function() {
                    var timer = 0;
                    return function(callback, ms) {
                        clearTimeout(timer);
                        timer = setTimeout(callback, ms);
                    };
                })();

                function searchTest() {
                    delay(function() {
                        const searchInput = document.getElementById('searchInput');
                        const searchText = searchInput.value.toLowerCase();
                        $.ajax({
                            url: '{{ route('test.search') }}',
                            type: 'GET',
                            data: {
                                search: searchText
                            },
                            success: function(data) {
                                var target = $('#searchInput').closest('div').siblings('div.row.g-4');
                                target.empty();
                                data.forEach(function(test) {
                                    target.append(`
                                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="${test.index * 0.1}s">
                                        <div class="service-item">
                                            <div class="icon-box-primary mb-4">
                                                <i class="${test.icon} text-dark"></i>
                                            </div>
                                            <h5 class="mb-3">${test.name}</h5>
                                                <small class="text-muted">${test.description} </small>
                                                <p class="text-primary"><b>₹ ${test.price}</b></p>
                                                <a class="btn btn-primary px-3" href="${test.url}">Add<i
                                                        class="bi bi-chevron-double-right ms-1"></i></a>
                                        </div>
                                    </div>
                                `);
                                });
                            }
                        });
                    }, 500);
                }
            </script>

        </div>
    </div>
    <!-- test desktop view end  -->


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-award text-dark"></i>
                        </div>
                        <h5 class="mb-3">Quality & Trust assured</h5>
                        <p class="mb-0"> Samples processed in NABL accredited Labs</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-people text-dark"></i>
                        </div>
                        <h5 class="mb-3">‘On-time’ Report</h5>
                        <p class="mb-0">Report on-time, Home Collection ASAP</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-cash-coin text-dark"></i>
                        </div>
                        <h5 class="mb-3">Fair Prices</h5>
                        <p class="mb-0">700+ Tests & Profiles at Budget-friendly Rates.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-headphones text-dark"></i>
                        </div>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="mb-0">24/7 Dedicated Support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Features Start -->
    <div class="container-fluid feature mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 pt-lg-5">
                    <div class="bg-white p-5 mt-lg-5">
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.3s">The Best Medical Test & Laboratory
                            Solution</h1>
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.4s">At MK Health Care Pathology Lab, we are
                            dedicated to providing top-notch medical testing services that are both affordable and
                            convenient. Our home testing options ensure that you can take care of your health without
                            leaving the comfort of your home. Whether you need routine blood work or specialized
                            diagnostic tests, we have you covered.</p>
                        <div class="row g-5 pt-2 mb-5">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-person-plus text-dark"></i>
                                </div>
                                <h5 class="mb-3">Experience Doctors</h5>
                                <span>Our team of highly experienced and board-certified doctors is committed to
                                    delivering accurate and reliable results. With years of expertise in the field of
                                    pathology, they ensure that every test is conducted with the utmost precision and
                                    care. Our doctors are always available to discuss your results and provide
                                    personalized medical advice.

                                </span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-check-all text-dark"></i>
                                </div>
                                <h5 class="mb-3">Advanced Microscopy</h5>
                                <span>Utilizing the latest advancements in microscopy, our lab is equipped with
                                    state-of-the-art technology to conduct a wide range of tests. Our advanced equipment
                                    ensures that we can detect even the smallest anomalies, providing you with the most
                                    accurate and detailed results possible. This technology enables us to offer a
                                    comprehensive array of tests, from routine blood panels to complex genetic
                                    screenings.</span>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 wow fadeIn" data-wow-delay="0.5s" href="">Explore More</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row h-100 align-items-end">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center justify-content-center" style="min-height: 300px;">
                                <button type="button" class="btn-play" data-bs-toggle="modal"
                                    data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-dark p-5">
                                <div class="experience mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Sample Preparation</span>
                                        <span class="text-white">90%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-accent" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="experience mb-4 wow fadeIn" data-wow-delay="0.4s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Result Accuracy</span>
                                        <span class="text-white">95%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-accent" role="progressbar" aria-valuenow="95"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="experience mb-0 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-white">Lab Equipments</span>
                                        <span class="text-white">90%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-accent" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container pt-5">
            <div class="row gy-5 gx-0">
                <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-4">What Clients Say About Our Lab Services!</h1>
                    <!-- <p class="text-white mb-5">Testimonials</p> -->
                    <a href="" class="btn btn-primary py-3 px-5">More Testimonials</a>
                </div>
                <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white p-5">
                        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                            <div class="testimonial-item">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-chat-left-quote text-dark"></i>
                                </div>
                                <p class="fs-5 mb-4">MKHealthcare's lab services are exceptional. The staff is
                                    knowledgeable and friendly, and the results are always accurate and timely. They
                                    truly care about their patients' well-being.".</p>
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0" src={{ asset('assets/img/testimonial-1.jpg') }}
                                        alt="">
                                    <div class="ps-3">
                                        <h5 class="mb-1">Sarah J.</h5>
                                        <!-- <span class="text-primary">Profession</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="icon-box-primary mb-4">
                                    <i class="bi bi-chat-left-quote text-dark"></i>
                                </div>
                                <p class="fs-5 mb-4">"The efficiency and professionalism of MKHealthcare's lab team are
                                    unmatched. I always feel confident in the quality of their services."</p>
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0" src={{ asset('assets/img/testimonial-2.jpg') }}
                                        alt="">
                                    <div class="ps-3">
                                        <h5 class="mb-1">John D</h5>
                                        <!-- <span class="text-primary">Profession</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <script>
        const packageRadio = document.getElementById('package-radio')
        const testRadio = document.getElementById('test-radio')
        const packageWrapper = document.getElementById('package-wrapper')
        const testWrapper = document.getElementById('test-wrapper')
        const packageWrapperMobile = document.getElementById('package-wrapper-mobile')
        const testWrapperMobile = document.getElementById('test-wrapper-mobile')

        function updateVisibility() {
            const width = window.innerWidth;
            if (width < 750) {
                packageWrapperMobile.classList.remove('d-none');
                testWrapperMobile.classList.remove('d-none');

                packageWrapper.classList.add('d-none')
                testWrapper.classList.add('d-none')
            } else {
                packageWrapperMobile.classList.add('d-none');
                testWrapperMobile.classList.add('d-none');

                packageWrapper.classList.remove('d-none')
                testWrapper.classList.add('d-none')
            }
        }

        window.addEventListener('resize', updateVisibility);

        // Initial check on page load
        updateVisibility();

        packageRadio.addEventListener('change', () => {
            packageWrapper.classList.remove('d-none')
            testWrapper.classList.add('d-none')
        })

        testRadio.addEventListener('change', () => {
            testWrapper.classList.remove('d-none')
            packageWrapper.classList.add('d-none')
        })

        function searchAll() {
            var searchInput = document.getElementById('searchInput');
            var searchTerm = searchInput.value.trim().toLowerCase();

            if (searchTerm.length > 0) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/searchAll?q=' + searchTerm, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var searchResults = JSON.parse(xhr.responseText);
                        var tests = searchResults.tests;
                        var packages = searchResults.packages;

                        console.log(tests);
                        console.log(packages);

                        var resultsHTML = '';

                        for (var i = 0; i < tests.data.length; i++) {
                            var item = tests.data[i];

                            resultsHTML +=
                                '<li  class="p-2 px-4 bg-white w-100"><a class="text-black"  href="/view/test/' +
                                item
                                .id + '" style="color:black;">' +
                                item
                                .name + '</a></li>';
                        }

                        for (var i = 0; i < packages.data.length; i++) {
                            var item = packages.data[i];

                            resultsHTML +=
                                '<li  class="p-2 px-4 bg-white w-100"><a class="text-black"  href="/view/package/' +
                                item
                                .id + '" style="color:black;">' +
                                item
                                .name + '</a></li>';
                        }


                        document.getElementById('searchList').innerHTML = resultsHTML;
                    }
                };
                xhr.send();
            } else {
                document.getElementById('searchList').innerHTML = '';
            }

        }

        function getTest(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', `/getTest/${id}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    // console.log(response);
                    let test = {
                        id: response.id,
                        name: response.name,
                        test_no: response.test_no,
                        price: response.price,
                        description: response.description,
                        parameter_id: response.parameter_id,
                        created_at: response.created_at,
                        updated_at: response.updated_at
                    };
                    console.log("ID:", test.id);
                    console.log("Name:", test.name);
                    console.log("Test No:", test.test_no);
                    console.log("Price:", test.price);
                    console.log("Description:", test.description);
                    console.log("Parameter ID:", test.parameter_id);
                    console.log("Created at:", test.created_at);
                    console.log("Updated at:", test.updated_at);
                    const testNameElement = document.querySelector('.test_name');
                    if (testNameElement) {
                        testNameElement.innerHTML = test.name;
                    }
                    const testDescriptionElement = document.querySelector('.test_description');
                    if (testDescriptionElement) {
                        testDescriptionElement.innerHTML = response.description;
                    }
                    const testPriceElement = document.querySelector('.test_price');
                    if (testPriceElement) {
                        testPriceElement.innerHTML = "₹ " + response.price + "/-";
                    }
                    // document.getElementById('test_id').href = "/view/test/" + response.id;
                }
            };
            xhr.send();
        }

        function getPackage(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', `/getPackage/${id}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    let package = {
                        id: response.id,
                        name: response.name,
                        price: response.price,
                        description: response.description,
                        test_ids: response.test_ids,
                        package_photo_url: response.package_photo_url,
                        created_at: response.created_at,
                        updated_at: response.updated_at
                    };
                    console.log("ID:", package.id);

                    var packageNameElement = document.getElementsByClassName('package_name')[0];
                    if (packageNameElement) {
                        packageNameElement.innerHTML = response.name;
                    }
                    var packageDescriptionElement = document.getElementsByClassName('package_description')[0];
                    if (packageDescriptionElement) {
                        packageDescriptionElement.innerHTML = response.description;
                    }
                    var packagePriceElement = document.getElementsByClassName('package_price')[0];
                    if (packagePriceElement) {
                        packagePriceElement.innerHTML = "₹ " + response.price + "/-";
                    }
                    var packageIdElement = document.getElementsByClassName('package_id')[0];
                    if (packageIdElement) {
                        packageIdElement.href = "/view/test/" + response.id;
                    }
                    var packageIdElement = document.getElementsByClassName('package_photo_url')[0];
                    if (packageIdElement) {
                        packageIdElement.src = 'assets/img/packages/' + response.package_photo_url;
                    }
                }
            };
            xhr.send();
        }
    </script>
</x-guest>

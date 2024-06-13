<x-guest>

    <!-- Carousel Form Start -->
    <div
        class="container position-absolute bg-white  rounded-md test-form p-0  top-40 to p-xl-40 top-lg-20 top-sm-10  left-10 left-sm-1">
        <x-book-form></x-book-form>
    </div>
    <!-- Carousel Form  Start -->


    <!-- Carousel Start -->

    <div class="container-fluid header-carousel px-0  flex-row">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 600px;">
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
                <div class="carousel-item" style="height: 600px;">
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



    <!-- Banner Start -->
    <div class="container-fluid banner mb-1 ">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5 " style="height: 300px">
                        <h3 class="text-white text-center mb-3">Book a Test</h3>
                        <a href="{{ route('book') }}"><img class='icon' src={{ asset('assets/img/icon/test.png') }}
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn " data-wow-delay="0.3s">
                    <div class="bg-warning d-flex flex-column p-5" style="height: 300px">
                        <h3 class="text-white text-center mb-3">Upload Prescription</h3>
                        <a href={{ route('login') }}><img class='icon'
                                src={{ asset('assets/img/icon/prescription.png') }} alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn " data-wow-delay="0.6s">
                    <div class="bg-info d-flex flex-column p-5" style="height: 300px">
                        <h3 class="text-white text-center mb-3">Download Report</h3>
                        <a href="{{ route('login') }}"><img class='icon' src={{ asset('assets/img/icon/report.png') }}
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 text-center">
                    <h1 class="display-6">Comprehensive Health Solutions</h1>
                    <p class="mb-5">We offer a wide range of health packages to suit your needs. Choose from our
                        selection of packages to get the right care for you.</p>
                </div>
            </div>
            <div class="row g-4 gx-0">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Total Health Checkup</h5>
                            <a class="text-primary font-weight-bold">Price: INR 1,999</a>

                            <p class="card-text">Our total health checkup includes a comprehensive range of tests to
                                help you identify any potential health concerns.</p>

                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Cholesterol Test</li>
                                <li>Lipid Profile</li>
                                <li>Complete Hemogram</li>
                                <li>Kidney Function Test</li>
                                <li>Liver Function Test</li>
                                <li>Blood Sugar</li>
                                <li>Thyroid Profile</li>
                                <li>Urine Routine Examination</li>
                            </ul>

                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Essential Wellness Check</h5>
                            <a class="text-primary font-weight-bold">Price: INR 999</a>

                            <p class="card-text">Our essential wellness checkup includes basic tests to give you an
                                overview of your health.</p>
                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Blood Sugar</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                                <li>Kidney Function Test</li>
                            </ul>

                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.5s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Basic Health Screening</h5>
                            <a class="text-primary font-weight-bold">Price: INR 1,200</a>
                            <p class="card-text">Our basic health screening includes basic tests to give you an
                                overview of your health.</p>
                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                                <li>Kidney Function Test</li>
                                <li>Thyroid Profile</li>
                            </ul>

                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.8s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Advanced Health Plus</h5>
                            <a class="text-primary font-weight-bold">Price: INR 2,500</a>

                            <p class="card-text">Our advanced health plus package includes additional tests to provide
                                a more comprehensive overview of your health.</p>
                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                                <li>Kidney Function Test</li>
                                <li>Thyroid Profile</li>
                                <li>Vitamin D</li>
                                <li>Vitamin B12</li>
                            </ul>

                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Basic Health Plus</h5>
                            <a class="text-primary font-weight-bold">Price: INR 800</a>

                            <p class="card-text">Our basic health plus package includes additional tests to provide a
                                more comprehensive overview of your health.</p>
                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Blood Sugar</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                            </ul>
                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Advanced Diagnostic Package</h5>
                            <a class="text-primary font-weight-bold">Price: INR 1,500</a>

                            <p class="card-text">Our advanced diagnostic package includes additional tests to provide a
                                more detailed assessment of your overall health.</p>
                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Blood Sugar</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                                <li>Kidney Function Test</li>
                                <li>Thyroid Profile</li>
                            </ul>
                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="1.1s">
                    <div class="card health-package-card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Complete Wellness Profile</h5>
                            <a class="text-primary font-weight-bold">Price: INR 2,000</a>
                            <p class="card-text">Our complete wellness profile includes additional tests to provide a
                                comprehensive assessment of your overall health.
                                <br>
                            </p>


                            <b>Tests Included:</b>
                            <ul class="list-unstyled">
                                <li>Complete Blood Count (CBC)</li>
                                <li>Blood Sugar</li>
                                <li>Lipid Profile</li>
                                <li>Liver Function Test</li>
                                <li>Kidney Function Test</li>
                                <li>Thyroid Profile</li>
                                <li>Vitamin D</li>
                                <li>Vitamin B12</li>
                            </ul>

                            <a href="#" class="btn btn-accent">Learn More</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- About End -->



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


    <!-- Service Start -->
    <div class="container-fluid container-service py-5">
        <div class="container pt-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3">Mostly Booked Lab Tests</h1>
                <p class="mb-5">Here is a list of mostly used lab test that you can choose from.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-heart-pulse text-dark"></i>
                        </div>
                        <h5 class="mb-3">COMPLETE BLOOD COUNT; CBC</h4>
                            <small class="text-muted">20 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 200</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-lungs text-dark"></i>
                        </div>
                        <h5 class="mb-3">HbA1c; GLYCOSYLATED HEMOGLOBIN</h4>
                            <small class="text-muted">2 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 350</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-virus text-dark"></i>
                        </div>
                        <h5 class="mb-3">URINE EXAMINATION, ROUTINE; URINE, R/E</h4>
                            <small class="text-muted">16 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 80</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-capsule-pill text-dark"></i>
                        </div>
                        <h5 class="mb-3">GLUCOSE, FASTING (F) AND POST MEAL (PP), 2 HOURS</h4>
                            <small class="text-muted">2 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 150</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-capsule text-dark"></i>
                        </div>
                        <h5 class="mb-3">THYROID PROFILE, TOTAL</h4>
                            <small class="text-muted">3 Parameter(s) Covered</small>

                            <p class="text-primary"><b>₹ 550</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-prescription2 text-dark"></i>
                        </div>
                        <h5 class="mb-3">SMART REPORT</h4>
                            <small class="text-muted">1 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 200</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-clipboard2-pulse text-dark"></i>
                        </div>
                        <h5 class="mb-3">GLUCOSE, FASTING (F)</h4>
                            <small class="text-muted">2 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 60</b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-file-medical text-dark"></i>
                        </div>
                        <h5 class="mb-3">SWASTHFIT SUPER 2</h4>
                            <small class="text-muted">55 Parameter(s) Covered</small>
                            <p class="text-primary"><b>₹ 1250 </b></p>
                            <a class="btn btn-dark px-3" href="">Add<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



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

</x-guest>

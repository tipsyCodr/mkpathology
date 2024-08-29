<x-guest>

    <!-- Service Start -->
    <div class="container-fluid container-service py-5 my-5">
        <div class="d-flex justify-content-start">
            <button type="button" onclick="history.back()" class="btn btn-accent mb-3">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>

        <div class="container pt-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3">Mostly Booked Lab Tests</h1>
                <p class="mb-5">Here is a list of mostly used lab test that you can choose from.</p>
            </div>
            <div class="">
                <input class='form-control m-4' placeholder="Search Test Here...." type="text" name="search"
                    id="searchInput" onkeyup="searchTest();">
            </div>
            <div class="row g-4">
                @foreach ($tests as $test)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->index * 0.1 }}s">
                        <div class="service-item">
                            <div class="icon-box-primary mb-4">
                                <i class="{{ $test->icon }} text-dark"></i>
                            </div>
                            <h5 class="mb-3">{{ $test->name }}</h4>
                                <small class="text-muted">{{ $test->description }} </small>
                                <p class="text-primary"><b>₹ {{ $test->price }}</b></p>
                                <a class="btn btn-primary px-3" href="{{ route('patient.tests.view') }}">Add<i
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
                                    <img class="flex-shrink-0" src="img/testimonial-1.jpg" alt="">
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
                                    <img class="flex-shrink-0" src="img/testimonial-2.jpg" alt="">
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

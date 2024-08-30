<x-guest>

    <!-- Service Start -->
    <div class="container-fluid container-service py-5 my-5">
        <div class="d-flex justify-content-start">
            <button type="button" onclick="history.back()" class="btn btn-accent mb-3">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>
        <x-package-modal />
        <div class="container pt-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3">Mostly Booked Lab Tests</h1>
                <p class="mb-5">Here is a list of mostly used lab test that you can choose from.</p>
            </div>
            <div class="">
                <input class='form-control m-4' placeholder="Search Test Here...." type="text" name="search"
                    id="searchInput" onkeyup="searchTest();">
            </div>
            <style>
                .service-box {
                    border: 1px solid #efefef;
                    height: 150px;
                    width: 250px;
                    background-color: #fff;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 5px;
                    padding-top: 10px;
                }

                .service-box>.body {
                    padding-left: 20px;
                    padding-right: 20px;

                }
            </style>
            <div class="row g-4">
                @foreach ($tests as $test)
                    <div class="col-lg-3 col-md-6 ">
                        <div class="service-box "onclick="populateSidebar(${ test.id }, 'test')"
                            style="display: flex; flex-direction: column; justify-content: space-between; height: 250px;">
                            <div class=" body">

                                <h5 class="mb-3" onclick="populateSidebar({{ $test->id }}, 'test')"
                                    style='height: 65px;'>
                                    {{ $test->name }}</h5>
                                <small class="text-muted">{{ $test->description }} </small>
                                <p class="text-primary"><b>₹ {{ $test->price }}</b></p>
                                <div class="d-flex flex-row justify-content-between">
                                    <small class="text-success"><i class="bi bi-check-circle-fill"></i> Home
                                        Collection</small>
                                    <small class="text-success"><i class="bi bi-check-circle-fill"></i> Lab
                                        Visit</small>
                                </div>
                            </div>
                            @if (isset($cart) && $cart->items->contains('test_id', $test->id))
                                <form action="{{ route('cart.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="test_id" name="product_id" value="{{ $test->id }}">
                                    <input type="hidden" name="type" value="test">
                                    <input type="hidden" name="quantity" value="1">
                                    <input class="position-relative bottom-0 btn btn-block btn-danger w-100"
                                        type="submit" value="Remove from Cart" style="margin-top: auto;">
                                </form>
                            @else
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="test_id" name="product_id" value="{{ $test->id }}">
                                    <input type="hidden" name="type" value="test">
                                    <input type="hidden" name="quantity" value="1">
                                    <input class="position-relative bottom-0 btn btn-block btn-accent w-100"
                                        type="submit" value="Add to Cart" style="margin-top: auto;">
                                </form>
                            @endif
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
                                            <div class="col-lg-3 col-md-6 onclick="populateSidebar(${ test.id }, 'test')" ">
                                                <div class="service-box "
                                                    style="display: flex; flex-direction: column; justify-content: space-between; height: 250px;">
                                                    <div class=" body">
                                                        <h5 class="mb-3" onclick="populateSidebar(${ test.id }, 'test')" style='height: 65px;'>${test.name}</h5>
                                                        <small class="text-muted">${test.description} </small>
                                                        <p class="text-primary"><b>₹ ${test.price}</b></p>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <small class="text-success"><i class="bi bi-check-circle-fill"></i> Home
                                                                Collection</small>
                                                            <small class="text-success"><i class="bi bi-check-circle-fill"></i> Lab
                                                                Visit</small>
                                                        </div>
                                                    </div>
                                                    <button class="position-relative bottom-0 btn btn-block btn-accent w-100" onclick="populateSidebar(${ test.id }, 'test')"  >View</button>
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

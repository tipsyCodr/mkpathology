<x-guest>
    <div class="container m-auto p-3">
        <div class="d-flex justify-content-start">
            <button type="button" onclick="history.back()" class="btn btn-accent mb-3">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>
        <form class="d-flex flex-column " action='{{ route('search.query') }}' onfocus="showlist();" onblur="hidelist();">
            <input id=searchInput class="  form-control me-2 border border-muted" style="border-radius: 10px"
                type="search" placeholder="&#128270; Search Packages and Tests" aria-label="Search" name='q'
                onkeyup="searchAll();">
            {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            <div id='searchListOverlay' class='p-2 mt-2 ' style="border-radius: 20px;">
                <ul id='searchList' class='list-group ' style=" list-style:none; padding:0;">

                </ul>
            </div>
        </form>
    </div>
    @if (isset($categories))
        <div class="container ">
            <h1 class="text-dark">Find Test By Category</h1>
            <div class="m-0 p-3 text-center text-black d-flex flex-row flex-wrap justify-content-evenly">
                @foreach ($categories as $category)
                    <a href="{{ route('search.category', $category->id) }}" class='m-2 p-2  d-flex flex-column'
                        style="width:150px; height:150px; border-radius:20px; box-shadow: 0px 3px 8px #e6e6e6">
                        <img class='img-fluid rounded-pill m-auto pe-auto'
                            style="width: 70%; background-color: #f4fcfd;" src="{{ $category->img }}" alt="">
                        <p class="nowrap" style="white-space: nowrap;color: #000;">{{ $category->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>


    @endif

    @if (isset($testsByCategory) || isset($packageByCategory))
        @if ($testsByCategory)
            <div class="container">
                <h1>Search results for "{{ $categoryName }}" test</h1>
                <div class=" list-unstyled d-flex flex-sm-column flex-lg-row flex-wrap justify-content-evenly">
                    @foreach ($testsByCategory as $test)
                        <div class="m-2 p-4  d-flex flex-column border" style="width:500px">
                            <div class="d-flex flex-row justify-content-between ">
                                <p>
                                    <b class=""><a class="d-block text-accent fs-4"
                                            href="{{ route('view.description', ['type' => 'test', 'id' => $test->id]) }}"
                                            style="width:265px; height:100px">
                                            {{ $test->name }}
                                        </a></b>
                                </p>
                                <div style="width:60px;"></div>
                                <p class="text-dark bold font-weight-bold m-0 fs-5">₹{{ $test->price }}</p>

                            </div>
                            <div class="d-flex flex-row justify-content-between my-3">
                                <small class="text-success"><i class="bi bi-check-circle-fill"></i> Home
                                    Collection</small>
                                <small class="text-success"><i class="bi bi-check-circle-fill"></i> Lab
                                    Visit</small>
                            </div>
                            <div class="body d-flex flex-row justify-content-between">
                                <div class="">
                                    <p class="text-dark m-0"
                                        style='max-height: 48px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>
                                        {{ $test->description }} </p>
                                    <small class='d-inline-block mb-2'>Reports in <span
                                            class='badge badge-danger bg-dark  rounded-pill'>72hr</span>
                                    </small>
                                </div>
                                <div class="">
                                    @if (isset($cart) && $cart->items->contains('test_id', $test->id))
                                        <form action="{{ route('cart.remove') }}" method="post">
                                            @csrf
                                            <input type="hidden" id="test_id" name="product_id"
                                                value="{{ $test->id }}">
                                            <input type="hidden" name="type" value="test">
                                            <input type="hidden" name="quantity" value="1">
                                            <input class="position-relative bottom-0 btn btn-block btn-danger w-100"
                                                type="submit" value="Remove from Cart" style="margin-top: auto;">
                                        </form>
                                    @else
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" id="test_id" name="product_id"
                                                value="{{ $test->id }}">
                                            <input type="hidden" name="type" value="test">
                                            <input type="hidden" name="quantity" value="1">
                                            <input class="position-relative bottom-0 btn btn-block btn-accent w-100"
                                                type="submit" value="Add to Cart" style="margin-top: auto;">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($testsByCategory->count() < 1)
                <h5 class="text-center text-muted  m-5"> No test</h5>
            @endif
        @endif

        <div class="container my-4">
            @if ($packageByCategory)
                <div class="container">
                    <h1>Search results for "{{ $categoryName }}" package</h1>
                    <div class=" list-unstyled d-flex flex-sm-column flex-lg-row flex-wrap justify-content-evenly">
                        @foreach ($packageByCategory as $package)
                            <div class="m-2 p-4  d-flex flex-column border" style="width:500px">
                                <div class="d-flex flex-row justify-content-between ">
                                    <p>
                                        <b class=""><a class="d-block text-accent fs-4"
                                                href="{{ route('view.description', ['type' => 'test', 'id' => $package->id]) }}"
                                                style="width:265px; height:100px">
                                                {{ $package->name }}
                                            </a></b>
                                    </p>
                                    <div style="width:60px;"></div>
                                    <p class="text-dark bold font-weight-bold m-0 fs-5">₹{{ $package->price }}</p>
                                </div>
                                <div class="body d-flex flex-row justify-content-between">
                                    <div class="">
                                        <p class="text-dark m-0" style='max-height: 48px;'>
                                            {{ $package->description }}
                                        </p>
                                        <small class='d-inline-block mb-2'>Reports in <span
                                                class='badge badge-danger bg-dark  rounded-pill'>72hr</span>
                                        </small>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('test.view.select', $package->id) }}"
                                            class="bg-accent d-block text-white btn">Book</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($packageByCategory->count() < 1)
                    <h5 class="text-center text-muted m-5"> No Packages</h5>
                @endif

            @endif
        </div>

    @endif

    @if (isset($tests) || isset($packages))
        <div class='container d-flex flex-row flex-wrap justify-content-evenly'>
            @foreach ($tests as $test)
                <div class="m-2 p-4  d-flex flex-column border" style="width:500px">
                    <div class="d-flex flex-row justify-content-between ">
                        <p>
                            <b class=""><a class="d-block text-accent fs-4"
                                    href="{{ route('view.description', ['type' => 'test', 'id' => $test->id]) }}"
                                    style="width:265px; height:100px">
                                    {{ $test->name }}
                                </a></b>
                        </p>
                        <div style="width:60px;"></div>
                        <p class="text-dark bold font-weight-bold m-0 fs-5">₹{{ $test->price }}</p>
                    </div>
                    <div class="body d-flex flex-row justify-content-between">
                        <div class="">
                            <p class="text-dark m-0" style='max-height: 48px;'>{{ $test->description }}
                            </p>
                            <small class='d-inline-block mb-2'>Reports in <span
                                    class='badge badge-danger bg-dark  rounded-pill'>72hr</span>
                            </small>
                        </div>
                        <div class="">
                            <a href="{{ route('test.view.select', $test->id) }}"
                                class="bg-accent d-block text-white btn">Book</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <script>
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
    </script>
</x-guest>

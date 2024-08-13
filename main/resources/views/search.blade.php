<x-guest>
    <div class="container m-auto p-3">
        <form class="d-flex flex-column " onfocus="showlist();" onblur="hidelist();">
            <input id=searchInput class="  form-control me-2 border border-muted" style="border-radius: 10px"
                type="search" placeholder="&#128270; Search Packages and Tests" aria-label="Search" onkeyup="searchAll();">
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
                <h1>Search results for "Fever" test</h1>
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
                            <div class="body d-flex flex-row justify-content-between">
                                <div class="">
                                    <p class="text-dark m-0" style='max-height: 48px;'>{{ $test->description }} </p>
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
            </div>
            @if ($testsByCategory->count() < 1)
                <h5 class="text-center text-muted"> No test</h5>
            @endif
        @endif

        <div class="container my-4">
            @if ($packageByCategory)
                <div class="container">
                    <h1>Search results for "Fever" package</h1>
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
                                        <p class="text-dark m-0" style='max-height: 48px;'>{{ $package->description }}
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
                    <h5 class="text-center text-muted"> No Packages</h5>
                @endif

            @endif
        </div>

    @endif
    </div>

</x-guest>

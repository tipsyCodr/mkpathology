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
        <div class="d-flex">
            @if ($testsByCategory)
                <div class="list-unstyled d-flex flex-sm-column flex-lg-row flex-wrap justify-content-evenly">
                    @foreach ($testsByCategory as $test)
                        <div class="m-2 p-2  d-flex flex-column" style="">
                            <img class='img-fluid rounded-pill m-auto pe-auto'
                                style="width: 70%; background-color: #f4fcfd;" src="{{ $test->img }}" alt="">
                            <a href="{{ route('test.view.select', $test->id) }}"
                                style="white-space: nowrap;color: #000;">{{ $test->name }}</a>
                        </div>
                    @endforeach
                </div>
        </div>
    @endif
    </div>


    @endif
</x-guest>

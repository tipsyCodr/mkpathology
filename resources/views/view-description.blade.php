<x-guest>
    <div class="container bg-gray-800 ">

        <div class='m-5'>
            <div class="d-flex justify-content-start pb-5 ">
                <button type="button" onclick="history.back()" class="btn btn-accent mb-3">
                    <i class="bi bi-arrow-left"></i> Back
                </button>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <h1 class='text-accent'> {{ $item->name }}</h1>
                <p class=" text-dark " style="font-size:1.5rem; font-weight: 900">₹{{ $item->price }}</p>
            </div>
            <br>
            @if (isset($cart) && $cart->items->contains('test_id', $item->id))
                <form action="{{ route('cart.remove') }}" method="post">
                    @csrf
                    <input type="hidden" id="test_id" name="product_id" value="{{ $item->id }}">
                    <input type="hidden" name="type" value="test">
                    <input type="hidden" name="quantity" value="1">
                    <input class="position-relative bottom-0 btn btn-block btn-danger w-100" type="submit"
                        value="Remove from Cart" style="margin-top: auto;">
                </form>
            @else
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" id="test_id" name="product_id" value="{{ $item->id }}">
                    <input type="hidden" name="type" value="test">
                    <input type="hidden" name="quantity" value="1">
                    <input class="position-relative bottom-0 btn btn-block btn-accent w-100" type="submit"
                        value="Add to Cart" style="margin-top: auto;">
                </form>
            @endif
            <br>

            @if (!is_null($item->id) && $type == 'test')
                @php
                    $testId = json_decode($item->id);
                    $test = App\Models\Test::find($testId);
                    $parameter_id = json_decode($test->parameter_id);
                    if (!is_null($parameter_id)) {
                        $parameters = App\Models\Parameter::whereIn('id', $parameter_id)->get();
                    } else {
                        $parameters = collect();
                    }
                @endphp
                <p class='text-dark '><b>{{ $parameters->count() }}</b>
                    parameter{{ $parameters->count() > 1 ? 's' : '' }}</p>
                <div class="collapse" id="collapseParameters">
                    <ul class="list-disc list-inside ps-3">
                        @foreach ($parameters as $parameter)
                            <li>{{ $parameter->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <p class="text-dark">
                    <a class="text-accent" data-bs-toggle="collapse" href="#collapseParameters" role="button"
                        aria-expanded="false" aria-controls="collapseParameters">
                        View parameters <i class="bi bi-chevron-down ms-1"></i>
                    </a>
                </p>
            @endif




            <small class=''>
                @if ($type == 'package')
                    @if (!is_null($item->test_id))
                        <h3 style="font-size:.9rem">Includes {{ count(json_decode($item->test_id)) }} Tests</h3>
                        <div class="text-left">
                            <a class="text-accent my-3 " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseParameters" aria-expanded="false"
                                aria-controls="collapseParameters">
                                View Included Tests<i class="bi bi-chevron-down"></i>
                            </a>
                        </div>
                        <div class="collapse" id="collapseParameters">
                            <ul class="p-0 list-disc list-inside text-accent">
                                @foreach (json_decode($item->test_id) as $testId)
                                    @php
                                        $test = App\Models\Test::find($testId);
                                        $parameter_id = json_decode($test->parameter_id);
                                        $parameters = App\Models\Parameter::whereIn('id', $parameter_id)->get();
                                    @endphp
                                    <li class="bg-gray-700 p-2 m-2 list-unstyled">
                                        <a class="d-block text-decoration-none" data-bs-toggle="collapse"
                                            href="#collapseParameters{{ $loop->index }}" role="button"
                                            aria-expanded="false" aria-controls="collapseParameters{{ $loop->index }}"
                                            style="color: inherit;">
                                            {{ $test->name }} <span
                                                class="font-weight-bold">({{ $parameters->count() }})</span>
                                        </a>
                                        <ul class="collapse" id="collapseParameters{{ $loop->index }}">
                                            @foreach ($parameters as $parameter)
                                                <li>{{ $parameter->name }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                @endif
            </small>
            <h3>What it is for ?</h3>

            <p>{{ $item->description }}</p>

            @if (!is_null($item->test_id))
                <h3>Tests Included:</h3>
                <ul>
                    @foreach (json_decode($item->test_id) as $testId)
                        @php
                            $test = App\Models\Test::find($testId);
                        @endphp
                        @if ($test)
                            <li> {{ $test->name }} </li>
                        @endif
                    @endforeach
                </ul>
            @endif
            @if (!is_null($item->test_id))
                @php
                    $testId = json_decode($item->id);
                    $test = App\Models\Test::find($testId);
                    $parameter_id = json_decode($test->parameter_id);
                    if (!is_null($parameter_id)) {
                        $parameters = App\Models\Parameter::whereIn('id', $parameter_id)->get();
                    } else {
                        $parameters = collect();
                    }
                @endphp

                @if (!$parameters->isEmpty())
                    <h3>Parameters:</h3>
                    <ul>

                        @foreach ($parameters as $parameter)
                            <li>{{ $parameter->name }}</li>
                        @endforeach
                    </ul>
                @endif


            @endif
        </div>
    </div>
</x-guest>

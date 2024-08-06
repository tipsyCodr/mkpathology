<x-guest>
    <div class="container bg-gray-800 ">
        <div class='m-5'>
            <div class="d-flex flex-row justify-content-between">
                <h1 class='text-accent'> {{ $item->name }}</h1>
                <p class=" text-dark " style="font-size:1.5rem; font-weight: 900">₹{{ $item->price }}</p>
            </div>
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
                <p class='text-dark '><b>{{ $parameters->count() }}</b> parameters</p>
            @endif


            <small class=''>
                @if ($type == 'package')
                    @if (!is_null($item->test_id))
                        <h3 style="font-size:.9rem">Includes {{ count(json_decode($item->test_id)) }} Tests</h3>
                    @endif
                @endif
            </small>
            <br>
            <a class="d-block w-full bg-dark text-center rounded-pill text-white p-2" href="/book/{{ $item->id }}">
                Book Now </a>
            <br>
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

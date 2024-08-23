<x-guest>
    <h1>Checkout</h1>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">

            <p>{{ $message }}</p>

        </div>
    @endif

    <div class="container p-2">
        <h2>Order Summary</h2>
        <ul>
            @if (isset($cart->items))
                @foreach ($cart->items as $item)
                    <li>
                        @if (isset($item->package))
                            {{ $item->package->name }} - Quantity: {{ $item->quantity }} - Price:
                            {{ $item->package->price }}
                        @elseif (isset($item->test))
                            {{ $item->test->name }} - Quantity: {{ $item->quantity }} - Price: {{ $item->test->price }}
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
        @if (!auth()->check())
            <x-book-cart></x-book-cart>
        @endif


    </div>



</x-guest>

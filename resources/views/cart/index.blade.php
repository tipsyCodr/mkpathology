<x-guest>
    <div class="container">
        <h1 class="display-4">Your Cart</h1>
        <div class="row">
            <h3 class="my-3">Total items in cart: {{ isset($cart->items) ? count($cart->items) : 0 }}</h3>
            <div class="card-list ">
                @if (isset($cart->items))
                    @foreach ($cart->items as $item)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    @if (is_null($item->test_id))
                                        {{ $item->package->name }}
                                    @else
                                        {{ $item->test->name }}
                                    @endif
                                </h5>
                                <p class="card-text">Quantity: {{ $item->quantity }}</p>
                                <p class="card-text">Price:
                                    @if (is_null($item->test_id))
                                        {{ $item->package->price }}
                                    @else
                                        {{ $item->test->price }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger" role="alert">
                        No items in cart.
                    </div>
                @endif
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center my-5">
                <div class="">
                    <div class=" d-flex flex-row justify-content-between text-right">
                        <div class="">
                            <h5 class="card-title px-3">Total Price
                                ₹{{ isset($cart->items)
                                    ? $cart->items->sum(function ($item) {
                                        return $item->quantity *
                                            ($item->type == 'test'
                                                ? ($item->test
                                                    ? $item->test->price
                                                    : 0)
                                                : ($item->package
                                                    ? $item->package->price
                                                    : 0));
                                    })
                                    : 0 }}
                            </h5>
                        </div>
                        <div>
                            <form action="{{ route('checkout.form') }}" method="GET">
                                @csrf
                                <button type='submit' class="btn btn-primary d-inline "
                                    {{ isset($cart->items) ? '' : 'disabled' }}>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-guest>

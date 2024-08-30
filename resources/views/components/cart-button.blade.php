{{-- Floating checkout button --}}
<div class="cart_wrapper">
    <a href="{{ route('cart.view') }}" class="" style="">
        @php
            $user = auth()->user();
            if ($user && !$user->hasRole('patient')) {
                // Ensure the user has a cart
                if (!$user->cart) {
                    $user->cart()->create(); // Create a cart if none exists
                }
                $cart = $user->cart;

                // $itemCount = $cart && $cart->items ? $cart->items->count() : 0;
            } elseif ($user && !$user->hasRole('admin')) {
                // Handle user-based cart
                $cart = App\Models\Cart::firstOrCreate(
                    ['session_id' => session()->getId()],
                    ['user_id' => null], // Adjust this as necessary
                );
            } else {
                // Handle session-based cart
                $cart = App\Models\Cart::firstOrCreate(
                    ['session_id' => session()->getId()],
                    ['user_id' => null], // Adjust this as necessary
                );
            }
            $itemCount = $cart && $cart->items ? $cart->items->count() : 0;

            // $itemCount = 0;

        @endphp

        @if ($itemCount > 0)
            <span class="badge rounded-pill bg-danger cart-badge">{{ $itemCount }}</span>
        @endif
        <span class="cart-text " style="padding-right:15px; ">Cart </span>
    </a>
</div>

@auth
    <div class="">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="logout-btn" style="">Logout</button>
        </form>
    </div>
@endauth
{{-- Floating checkout button --}}

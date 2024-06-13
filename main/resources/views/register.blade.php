<x-guest>
    <div class="flex mega-center p-6 m-5">

        <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm">
            @csrf

            <div class="flex flex-col items-center">
                <x-input type="text" name="name" label="Name" placeholder="Enter your name"
                    value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="email" name="email" label="Email" placeholder="Enter your email"
                    value="{{ old('email') }}" required autocomplete="email" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="password" name="password" label="Password" placeholder="Enter your password" required
                    autocomplete="new-password" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="password" name="password_confirmation" label="Confirm password"
                    placeholder="Confirm your password" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <div class="flex items-center mt-4">
                    <x-primary-button>
                        <span>{{ __('Register') }}</span>

                        <x-slot name="svg">
                            <svg class="w-5 h-5 mr-2 -ml-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </x-slot>
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-guest>

<x-guest>
    <x-auth-card>
        <h2 class="text-center">Book Now</h2>
        @if (isset($testId))
            <x-test-book-form :testId="$testId">
            </x-test-book-form>
        @else
            <x-test-book-form>
            </x-test-book-form>
        @endif
    </x-auth-card>
</x-guest>

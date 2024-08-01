<x-guest>
    <x-auth-card>
        <h2 class="text-center">Book Now</h2>
        @if (isset($packageId))
            <x-book-form :packageId="$packageId">
            </x-book-form>
        @else
            <x-book-form>
            </x-book-form>
        @endif
    </x-auth-card>
</x-guest>

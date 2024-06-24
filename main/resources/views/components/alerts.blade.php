@if (session()->has('success'))
    <div class="alert alert-success bg-green-300 text-green-700">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger bg-red-300 text-red-700">
        {{ session('error') }}
    </div>
@endif

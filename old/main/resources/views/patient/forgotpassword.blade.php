<x-app>
    <div>
        @include('components.alerts')

        <form action="{{ route('reset.link') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email address"
                    name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </form>
    </div>
</x-app>

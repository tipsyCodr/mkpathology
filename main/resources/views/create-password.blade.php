<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Create Password</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('password.create') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="hidden" id="email" class="form-control" name="email"
                                value="{{ $user->email }}" required>
                            <input type="hidden" id="id" class="form-control" name="id"
                                value="{{ $user->id }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control"
                                name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

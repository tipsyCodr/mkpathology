<x-guest>
    <div class="flex mega-center p-6 m-5">

        <form method="POST" action="{{ route('user.store') }}" class="w-full max-w-sm">
            @csrf

            <div class="flex flex-col items-center">
                <x-input type="text" name="name" label="Name" placeholder="Enter your name"
                    value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="mobile" name="mobile" label="Mobile" placeholder="Enter your mobile"
                    value="{{ old('mobile') }}" required autocomplete="mobile" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="number" name="pincode" label="Pincode" placeholder="Enter your pincode"
                    value="{{ old('pincode') }}" required autocomplete="pincode" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-select name="gender" label="Gender" :options="['Male', 'Female', 'Other']" required />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="number" name="age" label="age" placeholder="Enter your age"
                    value="{{ old('age') }}" required autocomplete="age" />
            </div>

            <div class="flex flex-col items-center mt-4">
                <x-input type="mobile" name="email" label="Email" placeholder="Enter your email"
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

            <div class="mb-3">
                <label for="reach" class="form-label">Reach me on</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="checkbox" id="wp" name="reach[]"
                        value="WP">
                    <label class="form-check-label" for="wp">
                        Whatsapp
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="checkbox" id="call" name="reach[]"
                        value="Call">
                    <label class="form-check-label" for="call">
                        Call
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="checkbox" id="email" name="reach[]"
                        value="Email">
                    <label class="form-check-label" for="email">
                        Email
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="checkbox" id="sms" name="reach[]"
                        value="SMS">
                    <label class="form-check-label" for="sms">
                        SMS
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Enter your address" required>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" id="authorize" name="authorize" value="true"
                    required>
                <label class="form-check-label" for="authorize">
                    I authorize MK Pathology representative to contact me. I understand that this information will be
                    used to
                    contact me.
                </label>
            </div>
            <div class="flex items-center justify-center mt-4">
                <div class="flex items-center mt-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</x-guest>

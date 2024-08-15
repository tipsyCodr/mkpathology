<x-guest>

    <div class="container  mt-4 mb-4">
        <div class="text-center">
            <h1>
                Create an Account
            </h1>
        </div>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="row">
                <div class='col-lg-2'></div>
                <div class="col-md-4">
                    <div class="form-wrapper">
                        <x-input type="text" name="name" label="Name" placeholder="Enter your name"
                            value="{{ old('name') }}" required autofocus autocomplete="name" />

                        <x-input type="mobile" name="mobile" label="Mobile" placeholder="Enter your mobile"
                            value="{{ old('mobile') }}" required autocomplete="mobile" />

                        <x-input type="email" name="email" label="Email" placeholder="Enter your email"
                            value="{{ old('email') }}" required autocomplete="email" />

                        <x-input type="password" name="password" label="Password" placeholder="Enter your password"
                            required autocomplete="new-password" />

                        <x-input type="password" name="password_confirmation" label="Confirm password"
                            placeholder="Confirm your password" required autocomplete="new-password" />
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-wrapper">
                        <x-select name="gender" label="Gender" :options="['Male', 'Female', 'Other']" required />

                        <label for="age">Your Age (in Years)</label>
                        <x-searchable-list name="age" label="Age" :options="range(1, 100)" required />

                        <label for="age">Your Address (So that we can deliver your reports)</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>

                        <div class="mb-3">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="number" class="form-control" id="pincode" name="pincode"
                                placeholder="Enter your pincode" pattern="[0-9]{6}" min="100000" max="999999"
                                title="Enter only numbers and exactly 6 digits" value="{{ old('pincode') }}" required
                                autocomplete="pincode" onkeypress="return isNumberKey(event)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-md-10">
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

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="authorize" name="authorize"
                                value="true" required>
                            <label class="form-check-label" for="authorize">
                                I authorize MK Pathology representative to contact me. I understand that this
                                information
                                will be
                                used to
                                contact me.
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary ">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57 || (evt.target && evt.target.value && evt.target.value
                    .length > 6 && charCode > 47)))
                return false;
            return true;
        }
    </script>
</x-guest>

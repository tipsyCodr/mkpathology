<form action="{{ route('test.book.store') }}" method="post" class="form-layout border border-amber-600">
    @csrf

    @auth
        @php
            $user = auth()->user();
        @endphp
        @php
            if (auth()->user()->hasRole('patient')) {
                $user = auth()->user();
            }
        @endphp

    @endauth

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    @guest
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="name" class="form-label">Name</label> --}}
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="age" class="form-label">Age</label> --}}
                    <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age"
                        required>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="pincode" class="form-label">Pincode</label> --}}
                    <input type="number" class="form-control" id="pincode" placeholder="Enter your pincode"
                        name="pincode" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="gender" class="form-label">Gender</label> --}}
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            {{-- <label for="address" class="form-label">Address</label> --}}
            <textarea class="form-control" id="address" placeholder="Enter your address" name="address" required></textarea>
        </div>
    @endguest
    @auth
        <input type="hidden" name="email" value="{{ $user->email }}">
        <input type="hidden" name="mobile" value="{{ $user->mobile }}">
    @endauth
    @guest
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="mobile" class="form-label">Mobile No.</label> --}}
                    <input type="tel" class="form-control" id="mobile" placeholder="Enter your mobile number"
                        name="mobile" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="email" class="form-label">Email address</label> --}}
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address"
                        name="email" required>
                </div>
            </div>
        </div>
    @endguest
    {{-- @auth
        <h1>Book A Test </h1>
    @endauth --}}
    <div class="test-book">

        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    {{-- <label for="test" class="form-label">Select A Test</label> --}}
                    <select class="form-select" id="test" name="test" required>
                        <option value="">Select A Test</option>
                        <!-- populate with tests -->

                        @php
                            $tests = \App\Models\Test::all();
                        @endphp
                        @foreach ($tests as $test)
                            <option class="" value="{{ $test->id }}">{{ $test->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <input type="date" class="form-control" id="date" name="date" required
                        min="<?php echo date('Y-m-d'); ?>" onchange="this.setCustomValidity('')"
                        oninput="this.setCustomValidity(this.value < new Date().toISOString().split('T')[0] ? 'Date cannot be in the past!' : '')"
                        pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-30)|(?:(?:0[13578]|1[02])-31))"
                        title="Enter a date in the format DD-MM-YYYY" onkeydown="if(event.key=='Enter'){this.blur()}">

                </div>
            </div>
            <span id='date-error' class=" text-red-500"></span>
            <br>

        </div>
    </div>

    @guest
        <div class="mb-3">
            <label for="reach" class="form-label">Reach me on</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" checked type="checkbox" id="wp" name="reach[]" value="WP">
                <label class="form-check-label" for="wp">
                    Whatsapp
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" checked type="checkbox" id="call" name="reach[]" value="Call">
                <label class="form-check-label" for="call">
                    Call
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" checked type="checkbox" id="email" name="reach[]" value="Email">
                <label class="form-check-label" for="email">
                    Email
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" checked type="checkbox" id="sms" name="reach[]" value="SMS">
                <label class="form-check-label" for="sms">
                    SMS
                </label>
            </div>
        </div>

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="authorize" name="authorize" value="true" required>
            <label class="form-check-label" for="authorize">
                I authorize MK Pathology representative to contact me. I understand that this information will be used
                to
                contact me.
            </label>
        </div>
    @endguest
    <button type="submit" class="btn btn-accent bg-orange-500 p-2 text-white rounded ml-3">Book Now</button>
</form>
<script>
    var dateInput = document.getElementById('date');
    var dateError = document.getElementById('date-error');
    if (dateInput) {
        dateInput.addEventListener('input', function(e) {
            var day = new Date(this.value).getDay();

            if (day === 0) {
                dateError.textContent = 'Sunday is not available.';
            } else {
                dateError.textContent = '';
            }

            this.setCustomValidity(day === 0 ? 'Sunday is not available.' : '');
        });
    }
</script>

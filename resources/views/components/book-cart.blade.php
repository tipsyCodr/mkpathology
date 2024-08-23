@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('checkout.process') }}" method="post" class="form-layout p-3">
    @csrf
    <div class="p-3 border shadow-sm my-3">
        <h2 class="text-center pb-3">Register</h2>
        @guest
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="name" class="form-label">Name</label> --}}
                        <input type="text" class="form-control" id="name" placeholder="Enter your name"
                            name="name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="age" class="form-label">Age</label> --}}
                        <input type="number" class="form-control" id="age" placeholder="Enter your age"
                            name="age" value="{{ old('age') }}" required>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="pincode" class="form-label">Pincode</label> --}}
                        <input type="number" class="form-control" id="pincode" placeholder="Enter your pincode"
                            name="pincode" value="{{ old('pincode') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="gender" class="form-label">Gender</label> --}}
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                {{-- <label for="address" class="form-label">Address</label> --}}
                <textarea class="form-control" id="address" placeholder="Enter your address" name="address" required>   {{ old('address') }} </textarea>
            </div>
        @endguest

        @auth
            @php
                $user = auth()->user();
            @endphp
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="hidden" name="mobile" value="{{ $user->mobile }}">
        @endauth
        @guest
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="mobile" class="form-label">Mobile No.</label> --}}
                        <input type="tel" class="form-control" id="mobile" placeholder="Enter your mobile number"
                            name="mobile" value="{{ old('mobile') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        {{-- <label for="email" class="form-label">Email address</label> --}}
                        <input type="email" class="form-control" id="email" placeholder="Enter your email address"
                            name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
            </div>
        @endguest
    </div>

    <div class="package-book p-3 border shadow-sm my-5">
        <h5 class="mb-4">Booking Details</h5>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="date" class="form-control" id="date" name="date" required
                        min="<?php echo date('Y-m-d'); ?>" onchange="this.setCustomValidity('')"
                        oninput="this.setCustomValidity(this.value < new Date().toISOString().split('T')[0] ? 'Date cannot be in the past!' : '')"
                        pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-30)|(?:(?:0[13578]|1[02])-31))"
                        title="Enter a date in the format DD-MM-YYYY" onkeydown="if(event.key=='Enter'){this.blur()}"
                        value="{{ old('date') }}">

                    <span id='date-error' class="  text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <select class="form-select" id="slot" name="slot" required>
                        <option value="">Select A Slot</option>
                        <option value="morning" {{ old('slot') == 'morning' ? 'selected' : '' }}>Morning (10:00 AM -
                            12:00 PM)</option>
                        <option value="afternoon" {{ old('slot') == 'afternoon' ? 'selected' : '' }}>Afternoon (12:00
                            PM - 04:00 PM)</option>
                        <option value="evening" {{ old('slot') == 'evening' ? 'selected' : '' }}>Evening (04:00 PM -
                            08:00 PM)</option>
                    </select>

                </div>
            </div>

        </div>


    </div>
    {{-- <input type="hidden" name="password" value="{{ old('password') }}"> --}}
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
            <input class="form-check-input" type="checkbox" id="authorize" name="authorize" value="true" required
                checked>
            <label class="form-check-label" for="authorize">
                I authorize MK Pathology representative to contact me. I understand that this information will be used
                to
                contact me.
            </label>
        </div>
    @endguest

    <button type="submit" class="btn btn-accent bg-orange-500 p-2 text-white rounded ml-3">Complete Booking</button>
</form>
<script>
    var dateInput = document.getElementById('date');
    var dateError = document.getElementById('date-error');
    if (dateInput) {
        dateInput.addEventListener('input', function(e) {
            var day = new Date(this.value).getDay();

            if (day === 0) {
                dateError.textContent = 'We\'re closed on Sundays. Please select a different day';
            } else {
                dateError.textContent = '';
            }

            this.setCustomValidity(day === 0 ? 'We\'re closed on Sundays. Please select a different day' : '');
        });
    }
</script>

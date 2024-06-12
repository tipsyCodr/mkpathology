<form action="{{ route('book.store') }}" method="post" class="form-layout border border-amber-600">
    @csrf

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
                <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode"
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

    <div class="row g-4">
        <div class="col-md-6">
            <div class="mb-3">
                {{-- <label for="mobile" class="form-label">Mobile No.</label> --}}
                <input type="mobile" class="form-control" id="mobile" placeholder="Enter your mobile number"
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



    <div class="row g-4">
        <div class="col-md-6">
            <div class="mb-3">
                {{-- <label for="package" class="form-label">Select P   ackage</label> --}}
                <select class="form-select" id="package" name="package" required>
                    <option value="">Select A Package</option>
                    <!-- populate with packages -->
                    <option class=" ">Total Health Checkup</option>
                    <option class="">Essential Wellness Check</option>
                    <option class="">Basic Health Screening</option>
                    <option class="">Advanced Health Plus</option>
                    <option class="">Basic Health Plus</option>
                    <option class="">Advanced Diagnostic Package</option>
                    <option class="">Complete Wellness Profile</option>mak
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                {{-- <label for="date" class="form-label">Appointment Date</label> --}}
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
        </div>
    </div>



    <div class="mb-3">
        {{-- <label for="slot" class="form-label">Slot</label> --}}
        <select class="form-select" id="slot" name="slot" required>
            <option value="">Select A Slot</option>
            <option value="morning">Morning</option>
            <option value="afternoon">Afternoon</option>
            <option value="evening">Evening</option>
        </select>
    </div>


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
            I authorize MK Pathology representative to contact me. I understand that this information will be used to
            contact me.
        </label>
    </div>
    <button type="submit" class="btn btn-accent">Book Now</button>
</form>

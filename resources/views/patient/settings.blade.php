<x-admin>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl font-semibold mb-4">Welcome to your account settings, {{ auth()->user()->name }}</h1>

        <section class="w-full max-w-md mt-5 border-blue-500 mb-10">
            <form action="{{ route('patient.update.name') }}" method="POST" class="space-y-4">
                @csrf


                <h3 class="text-lg font-semibold mb-4">Update Name</h3>
                <x-input name="name" type="text" value="{{ auth()->user()->name }}" label="Name" required />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Update</button>
            </form>
        </section>
        <hr>
        <section class="w-full max-w-md mt-5 border-blue-500 mb-10">
            <form action="{{ route('patient.update.email') }}" method="POST" class="space-y-4">
                @csrf


                <h3 class="text-lg font-semibold mb-4">Change and verify email</h3>
                <x-input name="email" type="email" value="{{ auth()->user()->email }}" label="Email" required />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Verfiy and Update</button>

            </form>
        </section>
        <hr>
        <section class="w-full max-w-md mt-5 border-blue-500 mb-10">
            <form action="{{ route('patient.update.pass') }}" method="POST" class="space-y-4">
                @csrf

                <h3 class="text-lg font-semibold mb-4">Update Password</h3>
                <x-input id="password" name="password" type="password" label="Password" required />
                <x-input id="password_confirmation" name="password_confirmation" type="password"
                    onkeyup="checkPasswordMatch(this)" label="Confirm Password" required />
                <span id="match-error" class=""></span>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"
                    id="password-update-button">Update</button>



            </form>
        </section>
        <hr />
        <section class="w-full max-w-md mt-5 border-blue-500 mb-10">
            <h3 class="text-lg font-semibold mb-4">Update Profile</h3>
            <form action="{{ route('patient.update.profile') }}" method="POST" class="space-y-4">
                @csrf

                <x-input name="age" type="number" value="{{ old('age', $patient->age) }}" label="Age"
                    required />
                <input type="hidden" name="gender" value="{{ old('gender', $patient->gender) }}">
                {{-- <select name="gender" label="Gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female
                    </option>
                    <option value="Other" {{ old('gender', $patient->gender) == 'Other' ? 'selected' : '' }}>Other
                    </option>
                </select> --}}

                <textarea name="address" id="address" cols="55" rows="5">{{ old('address', $patient->address) }}</textarea>

                <x-input name="city" type="text" value="{{ old('city', $patient->city) }}" label="City"
                    required />
                <x-input name="pincode" type="number" value="{{ old('pincode', $patient->pincode) }}" label="Pincode"
                    required />
                <button type="submit"
                    class="bg-blue-500 focus:ring-blue-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </form>
        </section>
    </div>
    <script>
        function checkPasswordMatch() {
            var password = document.getElementById("password");
            var confirmPassword = document.getElementById("password_confirmation");
            if (password.value != confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords Don't Match");
                document.getElementById('match-error').innerHTML =
                    "<span class='text-red-500'>Passwords Don't Match</span>";

            } else {
                confirmPassword.setCustomValidity('');
                document.getElementById('match-error').innerHTML = "<span class='text-green-500'>Passwords Match</span>";
            }
        }
    </script>
</x-admin>

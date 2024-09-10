<x-admin>
    <style>
        .multiselect-dropdown {
            padding: 6px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        input .multiselect-dropdown-search .form-control {
            padding: 15px;
        }
    </style>
    <form action="{{ route('package.update') }}" method="post" onsubmit="esvent.preventDefault();">
        @csrf
        <x-input name="name" label="Package Name" :placeholder="'Enter Package name'" value="{{ $package->name }}" />
        <x-input name="price" label="Package Price" :placeholder="'Enter Package price'" value="{{ $package->price }}" />
        <input type="hidden" name="id" value="{{ $package->id }}">
        <label class='font-semibold' for="description"> Enter Description (This will be shown in the
            package Description on
            everywhere)</label>
        <textarea class="w-full" name="description" label="Package Description" value=""
            placeholder="'Enter Package description'">{{ $package->description }}</textarea>

        <label for="categories" class='mb-6'>Select Categories <br></label>
        <select class="p-2 my-2" aria-placeholder="Select Categories" placeholder="Select Categories" id="categories"
            name="categories[]" multiple multiselect-search="true">

            @foreach ($packageCategory as $category)
                <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
            @endforeach

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

        <h3><b>Available Tests</b> </h3>
        <select name="tests[]" aria-placeholder="Select Tests" placeholder="Select Tests" id="tests" multiple
            multiselect-search="true" style="width: 100%;">
            @foreach ($packageTests as $test)
                <option value="{{ $test['id'] }}" selected>{{ $test['name'] }}</option>
            @endforeach
            @foreach ($tests as $test)
                <option value="{{ $test->id }}">{{ $test->name }}</option>
            @endforeach
        </select>
        <div class="my-2">
            <label for="package_photo_url"><b>Upload Package Photo (Size: Portrait)</b> </label>
            <br>
            <input class="my-2" type="file" name="package_photo_url" id="package_photo_url">
        </div>
        <div class="my-2">
            <label for="package_photo_url"><b>Upload Package Photo (Size: Landscape) </b> </label>
            <br>
            <input class="my-2" type="file" name="package_photo_url_wide" id="package_photo_url_wide  ">
        </div>
        <br>
        <button class='bg-blue-500 p-2 my-2 rounded-md text-white'>Update Package</button>
    </form>
</x-admin>

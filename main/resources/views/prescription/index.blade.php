<x-app>
    <form action="{{ route('prescription.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="mb-3">
            <label for="prescription" class="form-label">Prescription</label>
            <input class="form-control" type="file" id="prescription" name="prescription" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

</x-app>

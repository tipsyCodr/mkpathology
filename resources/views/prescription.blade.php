<x-guest>
    <div class="d-flex justify-content-end align-items-center vh-100"
        style="background-image: url('{{ asset('assets/img/prescription.jpg') }}'); background-size: cover; background-position: center;">

        <div class="form-wrapper bg-white rounded shadow ms-auto p-4" style="margin-right: 10rem;">
            <h4 class="mb-4">Upload prescription</h4>
            <small>Please fill the following details then upload the prescription in pdf or image</small>
            <form action="{{ route('prescription.store') }}" method="POST" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-accent">Upload</button>
            </form>
        </div>
    </div>
</x-guest>

<x-admin>
    <div class="flex justify-end mt-2">
        <a href="{{ route('prescription.view', ['id' => 1]) }}" class="btn btn-primary">View Prescription 1</a>
        <a href="{{ route('prescription.view', ['id' => 2]) }}" class="btn btn-primary">View Prescription 2</a>
        <a href="{{ route('prescription.view', ['id' => 3]) }}" class="btn btn-primary">View Prescription 3</a>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ram</td>
                <td>ram@gmail.com</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Shyam</td>
                <td>shyam@gmail.com</td>
                <td>9876543211</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Hari</td>
                <td>hari@gmail.com</td>
                <td>9876543212</td>
            </tr>
        </tbody>
    </table>
</x-admin>

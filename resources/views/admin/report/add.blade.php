<x-admin>
    {{-- {{ var_dump($inp) }} --}}
    <style>
        .file-preview {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .file-item {
            margin-right: 10px;
            text-align: center;
        }

        .file-item img {
            max-width: 100px;
            margin-bottom: 5px;
        }

        .file-item .pdf-icon {
            font-size: 50px;
            color: red;
        }
    </style>
    <h1 class='font-bold text-4xl my-5'>Add Report</h1>
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p><strong>Opps! Something went wrong.</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.report.store') }}" method="POST" class="w-full space-y-4" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" id="user_id" value="{{ $inp['user_id'] }}">
        <p class="font-bold mt-4" for="user_name">Name of Patient</p>
        <input type="text" name="user_name" id="user_name" value="{{ $inp['user_name'] }}" readonly
            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">

        <p class="font-bold mt-6" for="test_name">Name of Package</p>
        <input type="text" name="test_name" id="test_name" value="{{ $inp['test_name'] }}" readonly
            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        <div class="border px-4 pb-5">
            <p class="font-bold py-2">Upload Report (PDF, Image) </p>
            <input type="file" name="reports[]" id="reports" multiple required>
            <div class="file-preview" id="filePreview"></div>
        </div>

        <p>Comments</p>
        <textarea name="comments" id="comments" cols="30" rows="5"
            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>

    <script>
        document.getElementById('reports').addEventListener('change', function(event) {
            const fileInput = event.target;
            const previewContainer = document.getElementById('filePreview');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(fileInput.files).forEach(file => {
                const fileElement = document.createElement('div');
                fileElement.classList.add('file-item');

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src); // Free memory when done
                    fileElement.appendChild(img);
                } else if (file.type === 'application/pdf') {
                    const pdfIcon = document.createElement('div');
                    pdfIcon.classList.add('pdf-icon');
                    pdfIcon.innerHTML = '📄'; // Simple icon representation
                    fileElement.appendChild(pdfIcon);
                }

                fileElement.innerHTML += `<br><strong>${file.name}</strong>`;
                previewContainer.appendChild(fileElement);
            });
        });
    </script>

</x-admin>

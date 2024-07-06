<x-admin>
    <h1 class="text-4xl">Prescriptions</h1>
    <div class="container mx-auto">
        <div class="w-full mx-auto overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Mobile
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($prescriptions as $prescription)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $prescription->user_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.prescription.show', 'id=' . $prescription->id) }}"
                                    target="_blank">
                                    <img src="{{ asset('storage/uploads/prescriptions/' . $prescription->prescription) }}"
                                        alt="prescription" class="w-8 h-8 object-cover">
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $prescription->user_email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $prescription->user_mobile }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>

@props(['reports'])

<div class="container mx-auto px-4 lg:px-8 mt-6">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-5xl mx-auto">
        <!-- Header Section -->
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Pengaduan</h2>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse bg-white shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">No</th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Tanggal
                        </th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Isi
                            Laporan
                        </th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Status
                        </th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $report->sent_time }}
                            </td>
                            <td
                                class="px-6 py-4 text-center text-sm text-gray-700 border-b max-w-[300px] whitespace-nowrap overflow-hidden text-ellipsis">
                                {{ $report->deskripsi }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-yellow-500 border-b">{{ $report->status }}
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                <div class="flex justify-center space-x-3">
                                    <button type="button" onclick="showDeleteConfirmation('{{ $report->id }}')"
                                        class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5">
                                            <path
                                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('report.edit', ['id' => $report->id]) }}"
                                        class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('report.detail', ['id' => $report->id]) }}"
                                        class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-5 w-5">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="deleteConfirmationModal"
    class="fixed inset-0 z-10 w-screen overflow-y-auto opacity-0 invisible transform scale-95 transition-all duration-300 ease-out">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete
                            Data
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Are you sure you want to delete this Data?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">
                    <button type="submit"
                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
                </form>
                <button type="button" onclick="hideModal()"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleModal(id, show) {
        const modal = document.getElementById(id);
        modal.classList.toggle('opacity-100', show);
        modal.classList.toggle('visible', show);
        modal.classList.toggle('scale-100', show);
        modal.classList.toggle('opacity-0', !show);
        modal.classList.toggle('invisible', !show);
        modal.classList.toggle('scale-95', !show);
    }

    function showDeleteConfirmation(id) {
        document.getElementById('id').value = id;

        const form = document.getElementById('deleteForm');
        form.action = "{{ route('report.destroy', ['id' => ':id']) }}".replace(':id', id);

        toggleModal('deleteConfirmationModal', true);
    }


    function hideModal() {
        toggleModal('deleteConfirmationModal', false);
    }
</script>

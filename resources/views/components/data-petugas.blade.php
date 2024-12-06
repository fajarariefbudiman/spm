@props(['level', 'users'])
<div class="container mx-auto px-4 lg:px-8 mt-6">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-5xl mx-auto">
        <!-- Header Section -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Data Petugas</h2>

        <!-- Button Tambah -->
        <div class="my-7 text-left">
            <a href="{{ route('user.create', ['level' => 'petugas']) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                Tambah Data
            </a>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">No</th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Nama</th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">No. HP
                        </th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Level
                        </th>
                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $user->fullname }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $user->no_hp }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">{{ $user->level }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                <div class="flex justify-center space-x-3">
                                    <button type="button" onclick="showDeleteConfirmation('{{ $user->id }}')"
                                        class="inline-flex items-center text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5">
                                            <path
                                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('user.edit', ['level' => 'petugas', 'id' => $user->id]) }}"
                                        class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            @if ($users->total() > $users->perPage())
                <div class="flex flex-col items-center mt-20 mb-7">
                    <span class="text-sm text-gray-700">
                        Showing <span class="font-semibold">{{ $users->firstItem() }}</span> to
                        <span class="font-semibold">{{ $users->lastItem() }}</span> of
                        <span class="font-semibold">{{ $users->total() }}</span> results
                    </span>

                    <div class="flex items-center justify-center mt-4 space-x-1">
                        @if ($users->onFirstPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $users->previousPageUrl() }}"
                                class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif

                        @if ($users->lastPage() <= 5)
                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                @if ($page == $users->currentPage())
                                    <span
                                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                @endif
                            @endforeach
                        @else
                            @if ($users->currentPage() <= 3)

                                @foreach ($users->getUrlRange(1, 4) as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <span
                                            class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                    @endif
                                @endforeach

                                @if ($users->lastPage() > 5)
                                    <span class="px-4 py-2 text-gray-400">...</span>
                                    <a href="{{ $users->url($users->lastPage()) }}"
                                        class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $users->lastPage() }}</a>
                                @endif
                            @elseif ($users->currentPage() > $users->lastPage() - 3)
                                <a href="{{ $users->url(1) }}"
                                    class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">1</a>
                                <span class="px-4 py-2 text-gray-400">...</span>
                                @foreach ($users->getUrlRange($users->lastPage() - 4, $users->lastPage()) as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <span
                                            class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @else
                                <a href="{{ $users->url(1) }}"
                                    class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">1</a>
                                <span class="px-4 py-2 text-gray-400">...</span>
                                @foreach ($users->getUrlRange($users->currentPage() - 1, $users->currentPage() + 1) as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <span
                                            class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                    @endif
                                @endforeach
                                <span class="px-4 py-2 text-gray-400">...</span>
                                <a href="{{ $users->url($users->lastPage()) }}"
                                    class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $users->lastPage() }}</a>
                            @endif
                        @endif

                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}"
                                class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
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
                    <input type="hidden" name="id" id="user_id">
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
        document.getElementById('user_id').value = id;

        const form = document.getElementById('deleteForm');
        form.action = "{{ route('user.destroy', ['level' => 'petugas', 'id' => ':id']) }}".replace(':id', id);

        toggleModal('deleteConfirmationModal', true);
    }


    function hideModal() {
        toggleModal('deleteConfirmationModal', false);
        toggleModal('successModal', false);
    }

    function showModal() {
        toggleModal('successModal', true);
    }

    @if (session('success'))
        document.addEventListener('DOMContentLoaded', showModal);
    @endif
</script>

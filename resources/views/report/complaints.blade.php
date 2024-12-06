@props(['level', 'reports', 'user'])
<x-app-layout>
    <div class="flex h-100">
        <!-- Sidebar -->
        <x-sidebar-dashboard />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <x-topbar-dashboard />


            <div class="container mx-auto px-4 lg:px-8 mt-6">
                <div class="bg-white rounded-lg shadow-md p-6 max-w-5xl mx-auto">
                    <!-- Header Section -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Data Pengaduan</h2>

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse bg-white shadow-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">
                                        Isi Laporan</th>
                                    <th
                                        class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase border-b">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                                        <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                            {{ $report->sent_time }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                            {{ $report->deskripsi }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                            {{ $report->status }}</td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-700 border-b">
                                            <div class="flex justify-center space-x-3">
                                                <a href="{{ route('complaint.show', ['id' => $report->id]) }}"
                                                    class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="h-5 w-5">
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

                        <!-- Pagination -->
                        @if ($reports->total() > $reports->perPage())
                            <div class="flex flex-col items-center mt-20 mb-7">
                                <span class="text-sm text-gray-700">
                                    Showing <span class="font-semibold">{{ $reports->firstItem() }}</span> to
                                    <span class="font-semibold">{{ $reports->lastItem() }}</span> of
                                    <span class="font-semibold">{{ $reports->total() }}</span> results
                                </span>

                                <div class="flex items-center justify-center mt-4 space-x-1">
                                    @if ($reports->onFirstPage())
                                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @else
                                        <a href="{{ $reports->previousPageUrl() }}"
                                            class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($reports->lastPage() <= 5)
                                        @foreach ($reports->getUrlRange(1, $reports->lastPage()) as $page => $url)
                                            @if ($page == $reports->currentPage())
                                                <span
                                                    class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                            @else
                                                <a href="{{ $url }}"
                                                    class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                            @endif
                                        @endforeach
                                    @else
                                        @if ($reports->currentPage() <= 3)

                                            @foreach ($reports->getUrlRange(1, 4) as $page => $url)
                                                @if ($page == $reports->currentPage())
                                                    <span
                                                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}"
                                                        class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                                @endif
                                            @endforeach

                                            @if ($reports->lastPage() > 5)
                                                <span class="px-4 py-2 text-gray-400">...</span>
                                                <a href="{{ $reports->url($reports->lastPage()) }}"
                                                    class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $reports->lastPage() }}</a>
                                            @endif
                                        @elseif ($reports->currentPage() > $reports->lastPage() - 3)
                                            <a href="{{ $reports->url(1) }}"
                                                class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">1</a>
                                            <span class="px-4 py-2 text-gray-400">...</span>
                                            @foreach ($reports->getUrlRange($reports->lastPage() - 4, $reports->lastPage()) as $page => $url)
                                                @if ($page == $reports->currentPage())
                                                    <span
                                                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}"
                                                        class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                                @endif
                                            @endforeach
                                        @else
                                            <a href="{{ $reports->url(1) }}"
                                                class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">1</a>
                                            <span class="px-4 py-2 text-gray-400">...</span>
                                            @foreach ($reports->getUrlRange($reports->currentPage() - 1, $reports->currentPage() + 1) as $page => $url)
                                                @if ($page == $reports->currentPage())
                                                    <span
                                                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}"
                                                        class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $page }}</a>
                                                @endif
                                            @endforeach
                                            <span class="px-4 py-2 text-gray-400">...</span>
                                            <a href="{{ $reports->url($reports->lastPage()) }}"
                                                class="px-4 py-2 text-gray-700 bg-white border rounded-lg hover:bg-indigo-500 hover:text-white transition-colors duration-300">{{ $reports->lastPage() }}</a>
                                        @endif
                                    @endif

                                    @if ($reports->hasMorePages())
                                        <a href="{{ $reports->nextPageUrl() }}"
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

        </div>
    </div>

</x-app-layout>

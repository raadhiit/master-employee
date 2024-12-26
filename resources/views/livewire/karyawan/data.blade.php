<div>
    <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex space-x-2">
            <div class="relative flex-grow">
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Cari Nama Karyawan"
                    class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg ">
                <svg class="absolute left-2 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div> 
        </div>
    </div>

    <div class="overflow-x-auto mt-5 border">
        <table class="w-full border-collapse">
            <thead class="bg-blue-100 border-b">
                <tr>
                    <th class="px-1 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        No
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        NIK
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        unit
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        RFID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="devide-y devide-gray-200">
                @forelse ($karyawan as $k)
                <tr class="hover:bg-blue-50 transition duration-150">
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        {{ $karyawan->firstItem() + $loop->index }}
                    </td>
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        {{ $k->name }}
                    </td>
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        {{ $k->NIK }}
                    </td>
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        {{ $k->unit }}
                    </td>
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        @if ($k->rfid)
                            <!-- Ikon untuk Sudah Ada -->
                            <svg class="w-6 h-6 text-green-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        @else
                            <!-- Ikon untuk Belum Ada -->
                            <svg class="w-6 h-6 text-red-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        @endif
                    </td>
                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-500 text-center border">
                        <x-button type="button" class="text-sm bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-800"
                            @click="$dispatch('dispatch-karyawan-update', {id: '{{ $k->id }}'})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h2m4.243 4.243l1.414-1.414a2 2 0 00-2.828-2.828l-1.414 1.414m-2 2L7.05 16.95a2 2 0 00-.516 1.11l-.362 3.63a1 1 0 001.11 1.11l3.63-.362a2 2 0 001.11-.516l6.364-6.364a2 2 0 00-2.828-2.828L11 4.414z" />
                            </svg>
                        </x-button>
                        <x-danger-button @click="$dispatch('dispatch-karyawan-delete', {id: '{{ $k->id }}', name: '{{$k->name }}'})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V9a2 2 0 00-2-2m-2-3H9a2 2 0 00-2 2v1h10V6a2 2 0 00-2-2z" />
                            </svg>
                        </x-danger-button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 text-center">
                        Tidak ada data Karyawan
                    </td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-blue-100">
                <tr>
                    <td colspan="5"
                        class="px-6 py-3 text-right text-sm font-semibold text-gray-600 uppercase text-right">
                        Total Data Karyawan:
                    </td>
                    <td class="px-6 py-3 text-center text-sm font-bold text-gray-800">
                        {{ $total }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="p-4 bg-gray-100 border-t">
        {{ $karyawan->links() }}
    </div>
</div>

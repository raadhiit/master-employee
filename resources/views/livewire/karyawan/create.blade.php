<div class="max-w-7x1 mx-auto mt-3">
    <x-button class="py-4 ms-4 md:ms-0" @click="$wire.set('modalCreateUser', true)">
        Update
    </x-button>

    <x-dialog-modal wire:model.live="modalCreateUser" submit="save">
        <x-slot name="title">
            Update RFID
        </x-slot>

        <x-slot name="content">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4" wire:ignore>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama Karyawan
                    </label>
                    <select id="choose_karyawan" wire:model="name" wire:change="searchByName($event.target.value)"
                        class="w-full px-3 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg">
                        <option value="">Pilih Karyawan</option>
                        @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                            <!-- Pastikan yang dikirim adalah ID -->
                        @endforeach
                    </select>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="NIK">
                        NIK
                    </label>
                    <input wire:model="NIK" type="text" id="NIK"
                        class="w-full px-3 py-2 bg-gray-200 border @error('NIK') border-red-500 @else border-gray-300 @enderror rounded-lg"
                        readonly>
                    @error('NIK')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rfid">
                        RFID
                    </label>
                    <input wire:model="rfid_id" type="text" id="rfid"
                        class="w-full px-3 py-2 border @error('rfid_id') border-red-500 @else border-gray-300 @enderror rounded-lg"
                        readonly>
                    @error('rfid_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>
</div>

@push('scripts')
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // setInterval(function() {
        //     //     // Memanggil method 'getRFIDFromAPI' dari komponen Livewire
        //     //     @this.call('getRFIDFromAPI');
        //     // }, 1000); // Memanggil setiap 1000ms (1 detik)
        //     setInterval(function() {
        //         fetch('/api/store-rfid')
        //             .then(response => response.json())
        //             .then(data => {
        //                 if (data.rfid_id && data.rfid_id !== @this.get('rfid_id')) {
        //                     @this.set('rfid_id', data.rfid_id);
        //                 }
        //             });
        //     }, 1000);
        // });
        // document.addEventListener('DOMContentLoaded', function() {
        //     setInterval(function() {
        //         // Ambil nilai rfid_id dan employee_id dari Livewire atau tempat lain sesuai kebutuhan Anda
        //         const rfid_id = @this.get('rfid_id'); // Ambil nilai rfid_id dari Livewire
        //         const employee_id = @this.get('name'); // Ambil ID karyawan dari Livewire

        //         // Mengirim request POST ke API
        //         fetch('/api/store-rfid', {
        //                 method: 'POST',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                 },
        //                 body: JSON.stringify({
        //                     rfid_id: rfid_id, // Kirimkan nilai rfid_id yang didapat dari Livewire
        //                     employee_id: employee_id, // Kirimkan ID karyawan yang dipilih
        //                 }),
        //             })
        //             .then(response => response.json())
        //             .then(data => {
        //                 console.log(data); // Tampilkan respons dari server
        //                 if (data.rfid_id) {
        //                     // Menyimpan atau memperbarui nilai rfid_id setelah menerima respons
        //                     @this.set('rfid_id', data.rfid_id);
        //                 }
        //             })
        //             .catch(error => console.error('Error:', error));

        //     }, 2000); // Mengirim request setiap 1 detik (1000 ms)
        // });
    </script>
@endpush

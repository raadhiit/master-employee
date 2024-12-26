<div class="w-screen">
    {{-- <x-slot name="header">
        <h1 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">TES HEADER</h1>
    </x-slot> --}}

    <div class="md:container md:mx-auto">
        <livewire:karyawan.create />
    </div>

    <div class="p-4">
        <div class="md:container md:mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:karyawan.data />
            </div>
        </div>
    </div>
</div>

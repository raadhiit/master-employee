<div>
    <h1 class="text-center">TES RFID</h1>
    <div class="bg-sky-500/75 text-center container mx-auto">
        @if ($rfid_id)
            <p>RFID ID yang diterima: {{ $rfid_id }}</p>
        @else
            <p>Menunggu data RFID...</p>
        @endif
    </div>
</div>

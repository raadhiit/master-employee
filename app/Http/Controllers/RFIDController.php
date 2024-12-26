<?php

namespace App\Http\Controllers;

use App\Models\rfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;  // Menambahkan Livewire namespace

class RFIDController extends Controller
{
    public function getRFID(Request $r)
    {
        $rfid_id = $r->input('rfid_id');

        if ($rfid_id) {
            // Log data yang diterima
            Log::info("Data RFID diterima: " . $rfid_id);

            // Respon jika data valid
            return response()->json([
                'status' => 'success',
                'message' => 'RFID data diterima',
                'rfid_id' => $rfid_id
            ], 200);
        } else {
            // Log jika data tidak ditemukan
            Log::warning("Tidak ada data RFID yang diterima");

            // Respon jika tidak ada data
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data RFID yang diterima'
            ], 400);
        }
    }
}

<?php

namespace App\Livewire\Karyawan;

use Livewire\Component;
use App\Models\v_mas_karyawan;
use App\Livewire\Form\UpdateForm;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Create extends Component
{
    public UpdateForm $form;
    public $modalCreateUser = false;

    public $name;

    public $rfid_id;

    public $NIK;

    public function searchByName($id)
    {
        // $this->name = v_mas_karyawan::findOrFail($id);

        $karyawan = v_mas_karyawan::findOrFail($id);

        if($karyawan){
            $this->NIK = $karyawan->NIK;
            // $this->name = $karyawan->name;

        } else {
            session()->flash('error', 'Data Tidak Ditemukan');
        }
    }


    // Method untuk mengambil RFID dari API
    public function getRFIDFromAPI()
    {
        $response = Http::post('/store-rfid', [
            'rfid_id' => $this->rfid_id,  // RFID ID yang diterima dari API atau input
            'employee_id' => $this->name,  // ID karyawan yang dipilih dari dropdown
        ]);

        if ($response->successful()) {
            $rfidData = $response->json();
            $this->rfid_id = $rfidData['rfid_id']; // Menyimpan RFID ID dari response API
        } else {
            session()->flash('error', 'Gagal mengambil data RFID');
        }
    }

    public function render()
    {
        $karyawan = v_mas_karyawan::all();
        return view('livewire.karyawan.create', ['karyawan' => $karyawan]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class TestingRFID extends Component
{
    public $rfid_id;
    protected $listeners = ['rfidReceived' => 'updateRFID'];

    public function updateRFID($rfid_id)
    {
        $this->rfid_id = $rfid_id;
        Log::info("RFID ID diterima di Livewire: " . $this->rfid_id); 
    }
    public function render()
    {
        return view('livewire.testing-r-f-i-d');
    }
}

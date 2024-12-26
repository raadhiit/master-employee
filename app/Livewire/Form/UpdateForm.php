<?php

namespace App\Livewire\Form;

use App\Models\v_mas_karyawan;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateForm extends Component
{
    public ?v_mas_karyawan $v_mas_karyawan;

    #[Validate]
    public $name;

    #[Validate]
    public $rfid;

    public $karyawan = [];

    public function rules()
    {
        return [
            'rfid' => 'required
        '];
    }

    public function message() 
    {
        return [
            'rfid.required' => 'RFID harus diisi'
        ];
    }

    public function setKaryawan(v_mas_karyawan $v_mas_karyawan)
    {
        $this->karyawan = $v_mas_karyawan;
        $this->name = $v_mas_karyawan->name;
    }


    public function updateRFID()
    {
        $this->validate();

        $this->v_mas_karyawan->update(['rfid' => $this->rfid]);

        return true;
    }
}

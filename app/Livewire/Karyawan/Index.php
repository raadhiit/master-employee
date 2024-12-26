<?php

namespace App\Livewire\Karyawan;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Home')]
    public function render()
    {
        return view('livewire.karyawan.index');
    }
}

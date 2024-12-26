<?php

namespace App\Livewire\Karyawan;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Data extends Component
{
    use WithPagination;
    public $search = [];

    #[Url(history:true)]    
    public $perPage = 10;
    
    #[Url(history:true)]    
    public $sort = 'asc';

    public $selectAll = false;

    public function udpdatePage()
    {
        $this->resetPage();
    }

    public function getKaryawanProperty()
    {
        $query = DB::table('v_mas_karyawans')
        ->select([
            'id',
            'name',
            'NIK',
            'unit',
            'rfid'
        ])
        // ->whereNotNull('rfid')
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->paginate($this->perPage);

        return $query;
    }

    public function countKaryawan()
    {
        $count = DB::table('v_mas_karyawans')
        ->select([
            'id',
            'name',
            'NIK',
            'unit',
            'rfid'
        ])
        ->count();
        return $count;
    }

    #[On('updateRFID')]
    #[On('deleteRFID')]
    public function render()
    {
        // dd($this->Karyawan);
        return view('livewire.karyawan.data', [
            'karyawan' => $this->Karyawan,
            'total' => $this->countKaryawan()]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\kelas;


class Search extends Component
{
    public $kelas;
    public $jurusan;
    public $selectedState = NULL;

    public function mount()
    {
        $jurusan=['rpl','mm'];
        $this->kelas = kelas::all();              
    }

    public function render()
    {
        return view('livewire.search');
    }

    public function updatedSelectedState($state)
    {
       
    }
}
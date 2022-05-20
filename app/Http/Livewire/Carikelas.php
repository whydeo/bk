<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\kelas;
use App\models\jurusan;
class carikelas extends Component
{
    public $kelas;
    public $jurusan;

    public $selectedState = NULL;

    public function mount()
    {
        $this->kelas = kelas::all();
        $this->jurusan = collect();
    }

    public function render()
    {
        return view('livewire.carikelas');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->jurusan = jurusan::all();
        }
    }
}

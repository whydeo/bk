<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\kelas;
use App\models\jurusan;
class Search extends Component
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
        return view('livewire.search');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->jurusan = jurusan::all();
        }
    }
}

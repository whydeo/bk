<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\kelas;
use App\models\mapel;
class Select extends Component
{
    public $kelas;
    public $mapel;

    public $selectedState = NULL;

    public function mount()
    {
        $this->kelas = kelas::all();
        $this->mapel = collect();
    }

    public function render()
    {
        return view('livewire.select');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->mapel = mapel::where('id_kelas', $state)->get();
        }
    }
}

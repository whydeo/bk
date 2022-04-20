<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;


class Search extends Component
{
    public $kelas;
    public $jurusan;
    public $jurusans;

    public $nama;
    public $kelass;

    public function mount($kelas,$jurusan)
    {
        $this->kelas=$kelas;
        $this->jurusan=$jurusan;
        $this->nama=[];
        $this->jurusans=[];
        $this->kelass=[];

    }

    public function updatedkelas()
    {

        $this->nama= Siswa::where('nis', '=', 'new')
        ->where('id_siswa','=', $this->kelas)
        ->orderBy('created_at', 'asc')
        ->get()
        ->toArray();

        $this->jurusan = siswa::where('nis', '=', 'error')
                        ->orWhere('kelas', '=', $this->kelas)
                        ->orderBy('created_at', 'asc')->get();
                        
    }

    public function render()
    {
        $this->kelas = Siswa::where('nis', '=', 'new')->orderBy('created_at', 'asc')->get();
        return view('livewire.search');
    }
}
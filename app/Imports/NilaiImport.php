<?php

namespace App\Imports;

use App\Models\nilaisikap;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class NilaiImport implements  ToCollection
{
    public function collection(Collection $rows)
    {
        $user = auth()->user()->name;
        // dd($user);
        $user = auth()->user()->level;
        if ($user == 'paspa'&& $user=='paspi'){
            $kategori='Asrama';
        }
        elseif ($user == 'guru'){
            $kategori='Asrama';
        }
        // dd($rows['kelas']);
// $user='soldeo';
// $kategori='sekolah';
$i =0;
// dd($rows[$i+5][1]);
dd($rows[$i+5][4    ]);
for ($i=0; $i < $rows[$i+5][1] ; $i++)
 {

            nilaisikap::create([
                'nama_siswa' => $rows[$i+5][1],
                'id_poin' => 1,
                'penilai' => $user,
                'kategori' => $kategori,
                'nilai' => $rows[$i+5][4],
            ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 2,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[4],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 3,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[5],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
            // nilaisikap::create([
            //     'nama_siswa' => $row[2],
            //     'id_poin' => 1,
            //     'pemberi_nilai' => $user,
            //     'kategori' => $kategori,
            //     'nilai' => $row[3],
            // ]);
        }

    }
    // public function headingRow(): int
    // {
    //     return 6;
    // }
}

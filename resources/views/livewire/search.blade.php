{{-- <div>
 <div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Filter:</label>
        <select name="kelas" class="border shadow p-2 bg-white" wire:model='kelas'
        >
            <option value=''>Choose a Instance</option>
            @foreach($kelass as $instance)
                <option value={{ $instance->id_siswa }}>{{ $instance->kelas }}</option>
            @endforeach
        </select >
        <select name="jurusan" class="border shadow p-2 bg-white" wire:model='jurusan'
        >
            <option value=''>Choose a jurusans</option>
            @foreach($jurusanss as $job)
                <option value={{ $job->id_siswa }}>{{ $job->jurusan }}</option>
            @endforeach
        </select >
        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nis</th>
                                <th scope="col">kelas</th>
                                <th scope="col">jurusan</th>
                                <th scope="col">jenis deoooooo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @forelse ($nama as $task)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $task['nama_siswa'] }}</td>
                                <td>{{ $task['nis'] }}</td>
                                <td>{{ $task ['kelas'] }}</td>
                                <td>{{ $task ['jurusan'] }}</td>
                                <td>{{ $task ['kelamin'] }}</td>
                            </tr>
                            @empty
                            <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                            @endforelse
                        </tbody>
                    </table>
</div> --}}

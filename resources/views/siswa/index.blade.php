@extends('layouts.dasboard')
@livewireStyles
@section('content')

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
        <div class="container">
            <div class="row">
                <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                    </div>
                </form>

                <form class="form" method="get" action="{{ route('cari') }}" role="search">
                    @csrf
                        @livewire('search')
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </form>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif


                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nis</th>
                            <th scope="col">kelas</th>
                            <th scope="col">jurusan</th>
                            <th scope="col">jenis kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        @forelse ($siswas as $siswa)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td><a href="{{route('Siswa.show',$siswa->id)}}" >{{ $siswa->nama_siswa }}</a></td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->jurusan }}</td>
                            <td>{{ $siswa->kelamin }}</td>
                        </tr>
                        @empty
                        <td colspan="6" class="table-active text-center">Tidak Ada Data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
@endsection

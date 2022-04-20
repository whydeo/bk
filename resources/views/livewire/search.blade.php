<div>
 <div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Filter:</label>
        <select name="kelas" class="border shadow p-2 bg-white" wire:model='kelas'
        >
            <option value=''>Choose a Instance</option>
            @foreach($kelas as $instance)
                <option value={{ $instance->id_siswa }}>{{ $instance->kelas }}</option>
            @endforeach
        </select >
        @if (!is_null($selectedState))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">Mata Pelajaran</label>

            <div class="col-md-6">
                <select class="form-control" name="mapel">
                    <option value="" selected>Choose Mata Pelajaran</option>
                    @foreach($jurusan as $mapell)
                        <option value="{{ $mapell->id }}">{{ $mapell->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>


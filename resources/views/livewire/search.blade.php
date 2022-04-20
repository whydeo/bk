<div>
    <div class="form-group row" style="margin-left:-10%;width:40%">
        <label for="state" class="col-md-4 col-form-label text-md-right">Kelas</label>

        <div class="col-md-6">
            <select wire:model="selectedState" class="form-control" name="kelas">
                <option value="" selected>Choose Kelas</option>
                @foreach($kelas as $kelass)
                    <option value="{{ $kelass->id }}">{{ $kelass->kelas }}</option>
                @endforeach
            </select>
    </div>
    </div>
    @if (!is_null($selectedState))
        <div class="form-group row" style="margin-left:-19%;width:65%">
            <label for="city" class="col-md-4 col-form-label text-md-right">Jurusan </label>

            <div class="col-md-6">
                <select class="form-control" name="jurusan">
                    <option value="" selected>Choose Mata Pelajaran</option>
                    @foreach($jurusan as $jurusanl)
                        <option value="{{ $jurusanl->id }}">{{ $jurusanl->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>

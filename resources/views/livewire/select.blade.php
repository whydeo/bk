<div>
    <div class="form-group row">
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
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">Mata Pelajaran</label>

            <div class="col-md-6">
                <select class="form-control" name="mapel">
                    <option value="" selected>Choose Mata Pelajaran</option>
                    @foreach($mapel as $mapell)
                        <option value="{{ $mapell->id }}">{{ $mapell->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>

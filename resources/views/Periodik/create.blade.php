@extends('template.master')
@section('title', 'Form Periodik')
@section('content')
    <form action="{{ route('periodik.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Periodik</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Periodik</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value={{ old('nama') }}>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai</label>
                            <input type="date" class="form-control @error('mulai') is-invalid @enderror" id="mulai"
                                name="mulai" value={{ old('mulai') }}>
                            @error('mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="selesai">Selesai</label>
                            <input type="date" class="form-control @error('selesai') is-invalid @enderror" id="selesai"
                                name="selesai" value={{ old('selesai') }}>
                            @error('selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_aktif" id="aktif" value="1"
                                    checked>
                                <label class="form-check-label" for="aktif">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_aktif" id="tidak_aktif"
                                    value="0">
                                <label class="form-check-label" for="tidak_aktif">
                                    Tidak Aktif
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

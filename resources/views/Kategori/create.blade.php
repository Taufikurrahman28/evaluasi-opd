@extends('template.master')
@section('title', 'Form Kategori')
@section('content')
    <form action="{{ route('kategori.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-check">
                                <input class="form-check-input " type="radio" name="status_tampil" id="aktif"
                                    value="1" checked>
                                <label class="form-check-label" for="aktif">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_tampil" id="tidak_aktif"
                                    value="0">
                                <label class="form-check-label" for="tidak_aktif">
                                    Tidak Aktif
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_sumber">Jenis Sumber</label>
                            <select class="form-control @error('jenis_sumber') is-invalid @enderror" id="jenis_sumber"
                                name="jenis_sumber" required>
                               <option value="utama">Fitur Utama</option>
                               <option value="rekomendasi">Fitur Rekomendasi</option>
                            </select>
                            @error('jenis_sumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

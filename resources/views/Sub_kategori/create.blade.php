@extends('template.master')
@section('title', 'Tambah Sub Kategori')
@section('content')
    <form action="{{ route('sub_kategori.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Sub Kategori</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Sub Kategori</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Nama Kategori</label>
                            <select type="text" class="form-control @error('kategori_id') is-invalid @enderror"
                                id="kategori_id" name="kategori_id">
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_tampil" id="aktif"
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
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

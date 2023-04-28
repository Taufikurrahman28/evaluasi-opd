@extends('template.master')
@section('title', 'Tambah Evaluasi')
@section('content')
    <form action="{{ route('sub_kategori.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Evaluasi</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama OPD</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama WEB</label>
                                    <input type="text" class="form-control @error('nama_web') is-invalid @enderror"
                                        id="nama" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="url_web">URL</label>
                                    <input type="text" class="form-control @error('url_web') is-invalid @enderror"
                                        id="url_web" name="url_web">
                                    @error('url_web')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tanggal_peninjauan">Tanggal</label>
                                    <input type="date"
                                        class="form-control @error('tanggal-peninjauan') is-invalid @enderror"
                                        id="tanggal-peninjauan" name="tanggal-peninjauan">
                                    @error('tanggal-peninjauan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="url_web">Kategori</label>
                                    <input type="text" class="form-control @error('url_web') is-invalid @enderror"
                                        id="url_web" name="url_web" onchange="showTabel()">
                                    @error('url_web')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <table id="sub" class="table table-responsive w-full d-none">
                                <thead>
                                    <tr>
                                        <td>Sub Kategori</td>
                                        <td>Ketersediaan</td>
                                        <td>Keterangan</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:500px">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('kategori_id') is-invalid @enderror"
                                                    id="kategori_id" name="kategori_id">
                                                @error('kategori_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td style="width: 120px;">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('ketersediaan') is-invalid @enderror"
                                                    id="ketersediaan" name="ketersediaan">
                                                @error('ketersediaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td style="width: 610px;">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                    id="keterangan" name="keterangan">
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="button" onclick="tambahSub()">Tambah</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="5"></textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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

@push('script')
<script>
    const showTabel = () => {
        const tabel = document.getElementById('sub');
        tabel.classList.remove("d-none");
    }

    const tambahSub = () => {
        const tabel = document.getElementById('sub');
        var row = tabel.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = `<div class="form-group"><input type="text"class="form-control @error('kategori_id') is-invalid @enderror"id="kategori_id" name="kategori_id">@error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>`;
        cell2.innerHTML = `<div class="form-group"><input type="text"class="form-control @error('ketersediaan') is-invalid @enderror"id="ketersediaan" name="ketersediaan">@error('ketersediaan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>`;
        cell3.innerHTML = `<div class="form-group"><input type="text"class="form-control @error('keterangan') is-invalid @enderror"id="keterangan" name="keterangan">@error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>`;
        cell4.innerHTML = `<div class="form-group"><button class="btn btn-danger" type="button"onclick="hapusSub()">Hapus</button></div>`
    }

    const hapusSub = () => {
        const tabel = document.getElementById('sub');
        tabel.deleteRow(-1);
    }
</script>
@endpush


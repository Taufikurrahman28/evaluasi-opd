@extends('template.master')
@section('title', 'Tambah Evaluasi')
@section('content')
    <form action="{{ route('evaluasi.store') }}" id="form-evaluasi" method="post" novalidate enctype="multipart/form-data">
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
                                    <label for="nama_opd">Nama OPD</label>
                                    <input type="text" class="form-control @error('nama_opd') is-invalid @enderror"
                                        id="nama_opd" name="nama_opd" required>
                                    @error('nama_opd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_web">Nama WEB</label>
                                    <input type="text" class="form-control @error('nama_web') is-invalid @enderror"
                                        id="nama_web" name="nama_web" required>
                                    @error('nama_web')
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
                                        id="url_web" name="url_web" required>
                                    @error('url_web')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tanggal_pemantauan">Tanggal</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_pemantauan') is-invalid @enderror"
                                        id="tanggal_pemantauan" name="tanggal_pemantauan" required>
                                    @error('tanggal_pemantauan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        id="gambar" name="gambar[]" multiple required>
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id"
                                        name="kategori_id" onchange="showTabel()" required>
                                        @foreach ($kategori as $row)
                                            <option selected disabled>-- Pilih Kategori --</option>
                                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                        @endforeach
                                    </select>
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
                                    <tr class="tr-sub" id="row1">
                                        <td style="width:30%">
                                            <div class="form-group">
                                                <select
                                                    class="form-control input-sub @error('sub_kategori_id') is-invalid @enderror"
                                                    id="sub_kategori_id-1" name="sub_kategori_id[]" required>
                                                    <option value="" selected disabled>-- Pilih Sub Kategori --
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="width: 10%">
                                            <div class="form-group">
                                                <select
                                                    class="form-control input-ketersediaan @error('ketersediaan') is-invalid @enderror"
                                                    id="ketersediaan" name="ketersediaan[]" required>
                                                    <option value="" selected disabled>-- Pilih Ketersediaan --
                                                    </option>
                                                    <option value="1">Ada</option>
                                                    <option value="0">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="width: 50%">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control input-keterangan @error('keterangan') is-invalid @enderror"
                                                    id="keterangan" name="keterangan[]" required>
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td style="width: 5%">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="button"
                                                    onclick="tambahSub()">Tambah</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="col-12">
                                <label for="gambar">Catatan</label>
                                <div id="editor" style="height: 200px;">
                                </div>
                                <input type="hidden" name="catatan">
                                @error('catatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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

@push('style')
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endpush

@push('script')
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        let quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }]
                ]
            },
            theme: 'snow'
        });

        var form = document.querySelector('#form-evaluasi');
        form.onsubmit = function() {
            var catatan = document.querySelector('input[name=catatan]');
            catatan.value = quill.root.innerHTML;
        };
    </script>

    <script>
        //global variabel
        let lastRowId = 0;
        const tabel = document.getElementById('sub');

        //get sub kategori
        const getSubKategori = async () => {
            lastRowId++;
            const kategoriId = document.getElementById('kategori_id').value;
            let objectSubKategori = await fetch(`/evaluasi/getSubKategori/${kategoriId}`);
            let response = await objectSubKategori.json();
            response.map((e) => {
                const subKategori = document.getElementById(`sub_kategori_id-${lastRowId}`);
                const option = document.createElement("option");
                option.text = e.nama;
                option.value = e.id;
                subKategori.add(option);
            })
        }

        //tampilkan tabel dan get subcategori ketika kategori dipilih
        const showTabel = () => {
            tabel.classList.remove("d-none");
            getSubKategori();
        };


        //ambil semua nilai select sub kategori
        // const selectedSubKategori = [];
        // const addSubKategori = () => {
        //     const subKategoriSelect = document.getElementById(`sub_kategori_id-${lastRowId}`)
        //     const valueSubKategori = subKategoriSelect.value;
        //     selectedSubKategori.push(valueSubKategori);
        //     console.log(selectedSubKategori);
        // }

        //tambah form subkategori
        const tambahSub = () => {

            getSubKategori();
            var row = tabel.insertRow(-1);
            row.id = "row" + lastRowId;
            row.className = "tr-sub";
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML =
                `<div class="form-group"> <select class="form-control input-sub @error('sub_kategori_id') is-invalid @enderror"name="sub_kategori_id[]" id="sub_kategori_id-${lastRowId}" required><option value="" selected disabled >-- Pilih Sub Kategori --</option></select></div>`;
            cell2.innerHTML =
                `<div class="form-group"><select class="form-control input-ketersediaan @error('ketersediaan') is-invalid @enderror"id="ketersediaan" name="ketersediaan[]" required><option value="" selected disabled >-- Pilih Ketersediaan --</option><option value="1">Ada</option><option value="0">Tidak Ada</option></select></div>`;
            cell3.innerHTML =
                `<div class="form-group"><input type="text"class="form-control input-keterangan @error('keterangan') is-invalid @enderror"id="keterangan" name="keterangan[]" required>@error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>`;
            cell4.innerHTML =
                `<div class="form-group"><button class="btn btn-danger" type="button"onclick="hapusSub(${lastRowId})">Hapus</button></div>`;
        };

        //hapus form subkategori tambahan
        const hapusSub = (rowId) => {
            var row = document.getElementById('row' + rowId);
            const subKategoriValue = document.getElementById(`sub_kategori_id-${rowId}`).value
            let index = selectedSubKategori.indexOf(subKategoriValue);
            if (index > -1) {
                selectedSubKategori.splice(index, 1);
            }
            row.parentNode.removeChild(row);
            console.log(selectedSubKategori);

        };

        // const handleSubmit = () => {
        //     const formEvaluasi = document.getElementById('form-evaluasi');
        //     const uniqueArr = selectedSubKategori.filter(function(value, index, self) {
        //         return self.indexOf(value) === index;
        //     });

        //     if (uniqueArr.length !== selectedSubKategori.length) {
        //         alert("Nilai duplikat ditemukan!");
        //     } else {
        //         formEvaluasi.submit();
        //     }
        // };
    </script>
@endpush

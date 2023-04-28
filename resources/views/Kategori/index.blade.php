@extends('template.master')
@section('title','Kategori')
@section('content')
     <!-- DataTales Kategori -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th>Status Tampil</th>
                            <th>Jenis Sumber</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $row )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->periodik_id }}</td>
                            <td>@if ($row->status_tampil)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                            </td>
                            <td>{{ $row->jenis_sumber }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $row->id) }}"class="btn btn-warning">Edit</a>
                                <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>let table = new DataTable('#myTable');</script>
@endpush


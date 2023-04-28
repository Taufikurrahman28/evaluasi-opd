@extends('template.master')
@section('title','Sub Kategori')
@section('content')
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Kategori</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('sub_kategori.create') }}" class="btn btn-primary mb-3">Tambah Sub Kategori</a>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Kategori</th>
                            <th>Status Tampil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_kategori as $row )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->kategori->nama}}</td>
                            <td>@if ($row->status_tampil)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                            </td>

                            <td>
                                <a href="{{ route('sub_kategori.edit', $row->id) }}"class="btn btn-warning">Edit</a>
                                <a href="{{ route('sub_kategori.destroy', $row->id) }}"class="btn btn-danger">Hapus</a>
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
<script>let table = new DataTable('#datatable');</script>
@endpush


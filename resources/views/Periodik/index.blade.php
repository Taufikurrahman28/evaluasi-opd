@extends('template.master')
@section('title', 'Periodik')
@section('content')
    <!-- DataTales Kategori -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Periodik</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('periodik.create') }}" class="btn btn-primary mb-3">Tambah Periodik</a>
            <div class="table-responsive">
                @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                <table id="datatable" class="datatable table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Periodik</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodik as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->mulai->format('d-m-Y') }}</td>
                                <td>{{ $data->selesai->format('d-m-Y') }}</td>
                                <td>{{ $data->is_aktif ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    <a href="{{ route('periodik.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('periodik.destroy', $data->id) }}" method="POST" style="display: inline-block;">
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
<script>let table = new DataTable('#datatable');</script>
@endpush

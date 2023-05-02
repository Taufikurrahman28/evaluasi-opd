@extends('template.master')
@section('title', 'Evaluasi')
@section('content')
    <!-- DataTales Kategori -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Evaluasi</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('evaluasi.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-responsive">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table id="datatable" class="datatable table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama OPD</th>
                            <th>WEB</th>
                            <th>URL</th>
                            <th>Tanggal Pemantauan</th>
                            <th>Kategori</th>
                            <th>Periodik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluasi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_opd }}</td>
                                <td>{{ $data->nama_web }}</td>
                                <td>{{ $data->url_web }}</td>
                                <td>{{ $data->tanggal_pemantauan }}</td>
                                <td>{{ $data->kategori->nama }}</td>
                                <td>{{ $data->periodik->id }}</td>
                                <td>
                                    {{-- <a href="{{ route('evaluasi.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('evaluasi.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form> --}}
                                    <a href="{{ route('evaluasi.print', $data->id) }}" class="btn btn-warning">Print</a>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#modalDetail-{{ $data->id }}">
                                        Detail
                                    </button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@foreach ($evaluasi as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalDetail-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Evaluasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            @foreach ($item->gambar as $image)
                               <div class="mb-5 d-flex justify-content-center flex-col">
                                <img class="w-75 h-25 mb-5" src="{{ asset($image->path) }}" alt="hai">
                               </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover w-full">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Sub Kategori</td>
                                        <td>Ketersediaan</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->sub_kategori->nama }}</td>
                                            <td>{{ $detail->ketersediaan }}</td>
                                            <td>{{ $detail->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 font-weight-bold text-lg">
                                Catatan :
                            </div>
                            <div>
                                {!! $item->catatan !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


@push('script')
    <script>
        let table = new DataTable('#datatable');
    </script>
@endpush

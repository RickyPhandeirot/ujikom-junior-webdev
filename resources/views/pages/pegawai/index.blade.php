@extends('dashboard')

@section('content')
    <div class="container-fluid py-4">
        <h3>Pegawai</h3>
    </div>

    <table id="table-pegawai" class="table table-hover table-striped">
        <thead>
            <tr>
                {{-- <th scope="col">Foto</th> --}}
                <th scope="col">Nama Pegawai</th>
                <th scope="col">email</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $pegawai)
                <tr>
                    {{-- <td>
                        @if ($pegawai->avatar == null)
                            <span class="badge bg-danger">Tidak Ada Foto</span>
                        @else
                            <img class="img-thumbnail" src="{{ asset('storage/') . $pegawai->avatar }}"
                                alt="{{ $pegawai->name }}" width="100">
                        @endif
                    </td> --}}
                    <td>{{ $pegawai->name }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td>{{ $pegawai->phone_number }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-pegawai').DataTable();
        });
    </script>
@endpush

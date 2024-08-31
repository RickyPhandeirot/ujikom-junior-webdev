@extends('dashboard')

@section('content')
    <div class="container-fluid py-4">
        <br>
        <div class="d-flex align-items-center justify-content-between">
            <h3>Pegawai</h3>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fas fa-plus"></i>Tambah Pegawai
            </button>
        </div>
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
                    <td>
                        @php
                            $words = explode(' ', $pegawai->alamat);
                            $shortened = implode(' ', array_slice($words, 0, 9)); // Ambil 20 kata pertama
                            echo strlen($pegawai->alamat) > strlen($shortened) ? $shortened . '...' : $shortened;
                        @endphp
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-warning"
                                onclick="openEditModal('{{ $pegawai->id }}')">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="deleteUser('{{ $pegawai->id }}')">
                                <i class="fas fa-trash"></i>
                            </button>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-body">

                    <form>

                        <div class="mb-3">
                            <label for="addName" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="addName" name="name" required
                                style="background-color: #f0f8ff;">
                        </div>
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addEmail" name="email" required
                                style="background-color: #f0f8ff;">
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" name="password" required
                                style="background-color: #f0f8ff;">
                        </div>
                        <div class="mb-3">
                            <label for="addPhoneNumber" class="form-label">No HP</label>
                            <input type="phone_number" class="form-control" id="addPhoneNumber" name="phone_number"
                                style="background-color: #f0f8ff;">
                        </div>
                        <div class="mb-3">
                            <label for="addAlamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="addAlamat" rows="3" name="alamat" style="background-color: #f0f8ff;"></textarea>
                        </div>
                    </form>


                    {{-- <div class="mb-3">
                        <label for="avatar" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="avatar" name="avatar">
                    </div> --}}
                {{-- </div> --}}
                <div class="modal-body">
                    <form id="addForm">
                        <div class="mb-3">
                            <label for="addName" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="addName" name="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addEmail" name="email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="addPhoneNumber" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="addPhoneNumber" name="phone_number">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" name="password" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="addAlamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="addAlamat" rows="3" name="alamat"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button onclick="createUser()" type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ubah Pengguna</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editName">Nama</label>
                            <input required type="text" class="form-control" id="editName" name="name">
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="form-group">
                            <label for="editEmail">Email</label>
                            <input required type="email" class="form-control" id="editEmail" name="email">
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="form-group">
                            <label for="editPhoneNumber">Phone Number</label>
                            <input required type="text" class="form-control" id="editPhoneNumber"
                                name="phone_number">
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="form-group">
                            <label for="editPassword">Password</label>
                            <input required type="password" class="form-control" id="editPassword" name="password">
                            <div class="invalid-feedback"></div>

                        </div>
                        <div class="form-group">
                            <label for="editAlamat">Alamat</label>
                            <textarea class="form-control" id="editAlamat" rows="3" name="alamat"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="editUser()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .table-responsive {
            overflow-x: hidden;
        }

        #table-pegawai tbody td:nth-child(4) {
            max-height: 4.5em;
            /* Sesuaikan dengan kira-kira 3 baris teks */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            /* Tampilkan teks di lebih dari satu baris */
            word-wrap: break-word;
            /* Pecah kata di dalam teks panjang */
        }
    </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        let userId = null;
        $('#addModal').on('show.bs.modal', function(e) {
            $('#addForm').trigger('reset'); // Reset form input values
            $('#addForm input').removeClass('is-invalid'); // Remove 'is-invalid' class from inputs
            $('#addForm .invalid-feedback').empty(); // Clear any existing error messages
        });

        $('#editModal').on('show.bs.modal', function(e) {
            // Reset form input values
            $('#editForm input').removeClass('is-invalid'); // Remove 'is-invalid' class from inputs
            $('#editForm .invalid-feedback').empty(); // Clear any existing error messages
        });


        function createUser() {
            const url = "{{ route('api.pegawai.store') }}";

            // ambil form data
            let data = {
                name: $('#addName').val(),
                email: $('#addEmail').val(),
                phone_number: $('#addPhoneNumber').val(),
                password: $('#addPassword').val(),
                alamat: $('#addAlamat').val()
                // avatar: $('#addAvatar').prop('files')[0]

            }

            $.post(url, data)
                .done((response) => {
                    // Display success message
                    toastr.success('Pengguna berhasil ditambahkan', 'Sukses');

                    // Reload page after 1 second
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail((error) => {
                    // Get response error
                    let response = error.responseJSON;

                    // Display error message
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    // Display validation errors
                    if (response.errors) {
                        displayValidationErrors(response.errors, '#addForm');
                    }
                });
        }



        function editUser() {
            let url = "{{ route('api.pegawai.update', ':userId') }}";
            url = url.replace(':userId', userId);

            // ambil form data
            let data = {
                name: $('#editName').val(),
                email: $('#editEmail').val(),
                phone_number: $('#editPhoneNumber').val(),
                password: $('#editPassword').val(),
                alamat: $('#editAlamat').val(),
                _method: 'PUT'
            }

            $.post(url, data)
                .done((response) => {
                    // Display success message
                    toastr.success('Pengguna berhasil diperbarui', 'Sukses');

                    // Reload page after 1 second
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail((error) => {
                    // Get response error
                    let response = error.responseJSON;

                    // Display error message
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                    // Display validation errors
                    if (response.errors) {
                        displayValidationErrors(response.errors, '#editForm');
                    }
                });

        }

        function displayValidationErrors(errors, formId) {
            // Loop through each error
            for (const error in errors) {
                // Find the input field with the error
                let input = $(`${formId} input[name="${error}"]`);

                // Add 'is-invalid' class to input field
                input.addClass('is-invalid');

                // Create error feedback element
                let feedbackElement = `<div class="invalid-feedback">`;
                feedbackElement += `<ul class="list-unstyled">`;
                errors[error].forEach((message) => {
                    feedbackElement += `<li>${message}</li>`;
                });
                feedbackElement += `</ul>`;
                feedbackElement += `</div>`;

                // Append the error feedback after the input field
                input.after(feedbackElement);
            }
        }

        function deleteUser(userId) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Pengguna akan dihapus, kamu tidak bisa mengembalikannya lagi!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('api.pegawai.destroy', ':userId') }}";
                    url = url.replace(':userId', userId);

                    $.post(url, {
                            _method: 'DELETE'
                        })
                        .done((response) => {
                            toastr.success('Pengguna berhasil dihapus', 'Sukses');

                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        })
                        .fail((error) => {
                            Swal.fire({
                                title: 'Error',
                                text: 'Gagal menghapus pengguna',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        }

        function openEditModal(id) {
            userId = id;

            let url = `{{ route('api.pegawai.show', ':userId') }}`;
            url = url.replace(':userId', userId);

            $.get(url)
                .done((response) => {
                    $('#editName').val(response.data.name);
                    $('#editEmail').val(response.data.email);
                    $('#editPhoneNumber').val(response.data.phone_number);
                    $('#editAlamat').val(response.data.alamat);

                    $('#editModal').modal('show');
                })
                .fail((error) => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal mengambil data pengguna',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        }


        $(document).ready(function() {
            $('#table-pegawai').DataTable();
            scrollX: true
        });
    </script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-12 text-center">
            <a href="/" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Halaman Welcome
            </a>
        </div>
    </div>

    <!-- Alert Sukses -->
    @if (session('success'))
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm rounded-pill mb-3" role="alert" style="max-width: 100%; width: auto;">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div class="text-center flex-grow-1">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(function() {
                    alert.remove();
                }, 500);
            }
        }, 5000);
    </script>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-bold my-4">{{ __('Daftar Klub Sepak Bola') }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kota</th>
                                    <th class="text-center">Negara</th>
                                    <th class="text-center">Tahun Berdiri</th>
                                    <th class="text-center">Stadion</th>
                                    <th class="text-center">Pelatih</th>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clubs as $club)
                                <tr>
                                    <td class="text-center">{{ $club->nama }}</td>
                                    <td class="text-center">{{ $club->kota }}</td>
                                    <td class="text-center">{{ $club->negara }}</td>
                                    <td class="text-center">{{ $club->tahun_berdiri }}</td>
                                    <td class="text-center">{{ $club->stadion }}</td>
                                    <td class="text-center">{{ $club->pelatih }}</td>
                                    <td class="text-center">
                                        <!-- Menampilkan gambar logo -->
                                        @if ($club->logo)
                                        <img src="{{ asset('storage/logos/' . $club->logo) }}" alt="Logo {{ $club->nama }}" style="max-width: 100px; max-height: 100px;">
                                        @else
                                        <span class="text-muted">Tidak ada logo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('clubs.show', $club->id) }}" class="btn btn-sm btn-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail">
                                                <i class="bi bi-eye-fill"></i> Lihat
                                            </a>
                                            <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-sm btn-warning me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="bi bi-pencil-fill"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $club->id }}">
                                                <i class="bi bi-trash3-fill"></i> Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="deleteModal{{ $club->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus klub ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('clubs.destroy', $club->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada data klub.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Navigasi halaman -->
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        @if ($clubs->previousPageUrl())
                        <a href="{{ $clubs->previousPageUrl() }}" class="btn btn-outline-primary">&laquo; Sebelumnya</a>
                        @else
                        <button class="btn btn-outline-primary" disabled>&laquo; Sebelumnya</button>
                        @endif

                        @if ($clubs->nextPageUrl())
                        <a href="{{ $clubs->nextPageUrl() }}" class="btn btn-outline-primary ms-2">Selanjutnya &raquo;</a>
                        @else
                        <button class="btn btn-outline-primary ms-2" disabled>Selanjutnya &raquo;</button>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6b9df0, #3a79ff);
    }

    .card {
        border-radius: 20px;
    }

    .btn-outline-light {
        border-color: #fff;
    }

    .btn-outline-light:hover {
        background-color: #fff;
        color: #3a79ff;
    }

    .table thead {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .btn-outline-primary {
        border-color: #3a79ff;
    }

    .btn-outline-primary:hover {
        background-color: #3a79ff;
        color: #fff;
    }

    .modal-content {
        border-radius: 20px;
    }

    .modal-header {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .modal-footer {
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    /* Penyesuaian agar tabel lebih lebar */
    .table-responsive {
        overflow-x: auto;
    }

    /* Memperluas card untuk menampung tabel yang lebih lebar */
    .card-body {
        min-width: 800px; /* Atur sesuai kebutuhan lebar tabel */
    }

    /* Alert Sukses */
    .alert {
        width: auto;
        max-width: 100%;
        display: flex;
        align-items: center;
        margin-top: 20px; /* Jarak atas alert */
        margin-bottom: 20px; /* Jarak bawah alert */
    }

    .alert .flex-grow-1 {
        flex: 1;
    }
</style>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg p-5">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-bold my-4">Edit Klub</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('clubs.update', $club->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Klub</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $club->nama) }}" required>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota', $club->kota) }}" required>
                            @error('kota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="negara" class="form-label">Negara</label>
                            <input type="text" name="negara" id="negara" class="form-control @error('negara') is-invalid @enderror" value="{{ old('negara', $club->negara) }}" required>
                            @error('negara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" id="tahun_berdiri" class="form-control @error('tahun_berdiri') is-invalid @enderror" value="{{ old('tahun_berdiri', $club->tahun_berdiri) }}" required>
                                @error('tahun_berdiri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stadion" class="form-label">Stadion</label>
                                <input type="text" name="stadion" id="stadion" class="form-control @error('stadion') is-invalid @enderror" value="{{ old('stadion', $club->stadion) }}" required>
                                @error('stadion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pelatih" class="form-label">Pelatih</label>
                            <input type="text" name="pelatih" id="pelatih" class="form-control @error('pelatih') is-invalid @enderror" value="{{ old('pelatih', $club->pelatih) }}" required>
                            @error('pelatih')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo Klub</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if ($club->logo)
                        <div class="mb-3">
                            <label for="current_logo" class="form-label">Logo Saat Ini</label><br>
                            <img src="{{ asset('storage/logos/' . $club->logo) }}" alt="Current Logo" class="img-thumbnail" width="200">
                            <input type="hidden" name="current_logo" value="{{ $club->logo }}">
                        </div>
                        @endif

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary w-100">Perbarui</button>
                        </div>
                    </form>
                    <!-- Navigasi kembali -->
                    <div class="text-center mt-3">
                        <a href="{{ route('clubs.index') }}" class="text-decoration-none">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .bg-primary {
        background-color: #3a79ff;
    }

    .card {
        border-radius: 20px;
    }

    .btn-outline-primary {
        border-color: #3a79ff;
        color: #3a79ff;
    }

    .btn-outline-primary:hover {
        background-color: #3a79ff;
        color: #fff;
    }

    .btn-primary {
        background-color: #3a79ff;
        border-color: #3a79ff;
    }

    .btn-primary:hover {
        background-color: #6b9df0;
        border-color: #6b9df0;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: #dc3545;
    }
</style>
@endsection

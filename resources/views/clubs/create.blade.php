@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg p-5">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-bold my-4">Tambah Klub Baru</h3>
                </div>
                <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Klub</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required>

                        @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="negara" class="form-label">Negara</label>
                        <input id="negara" type="text" class="form-control @error('negara') is-invalid @enderror" name="negara" value="{{ old('negara') }}" required>

                        @error('negara')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                            <input id="tahun_berdiri" type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" name="tahun_berdiri" value="{{ old('tahun_berdiri') }}" required>

                            @error('tahun_berdiri')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stadion" class="form-label">Stadion</label>
                            <input id="stadion" type="text" class="form-control @error('stadion') is-invalid @enderror" name="stadion" value="{{ old('stadion') }}" required>

                            @error('stadion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input id="pelatih" type="text" class="form-control @error('pelatih') is-invalid @enderror" name="pelatih" value="{{ old('pelatih') }}" required>

                        @error('pelatih')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo Klub</label>
                        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept="image/*">

                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
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
@endsection

@section('styles')
<style>
    .card {
        background: #f9f9f9;
        border-radius: 20px;
    }

    .card-header {
        background-color: #3a79ff;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #3a79ff;
    }

    .form-label {
        font-size: 1.1rem;
        font-weight: 500;
        color: #6c757d;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #3a79ff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #6b9df0;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: #dc3545;
    }
</style>
@endsection

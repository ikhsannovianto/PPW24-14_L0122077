@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg p-5">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-bold my-4">Detail Klub</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Nama Klub</h5>
                            <p>{{ $club->nama }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Kota</h5>
                            <p>{{ $club->kota }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Negara</h5>
                            <p>{{ $club->negara }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Tahun Berdiri</h5>
                            <p>{{ $club->tahun_berdiri }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Stadion</h5>
                            <p>{{ $club->stadion }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <h5 class="form-label text-primary">Pelatih</h5>
                            <p>{{ $club->pelatih }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 class="form-label text-primary">Logo Klub</h5>
                            @if ($club->logo)
                                <img src="{{ asset('storage/logos/' . $club->logo) }}" alt="Logo {{ $club->nama }}" class="img-fluid" style="max-width: 100px; height: auto;">
                            @else
                                <p>Logo tidak tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>
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
        border: 1px solid rgba(0, 0, 0, 0.125);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: -50px; /* Menambahkan jarak ke atas */
    }

    .card-header {
        background-color: #3a79ff;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .form-label {
        font-size: 1.1rem;
        font-weight: 500;
        color: #6c757d;
    }

    .text-primary {
        color: #3a79ff !important;
        font-weight: bold;
    }

    .text-center {
        text-align: center;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mb-3 {
        margin-bottom: 1.5rem !important;
    }

    .p-5 {
        padding: 3rem !important;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: #dc3545;
    }

    .btn-primary {
        background-color: #3a79ff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #6b9df0;
    }
</style>
@endsection

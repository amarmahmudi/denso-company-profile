@extends('layouts.app')

@section('title', 'Gallery - DENSO')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Galeri Kegiatan & Fasilitas</h1>
        <p class="lead text-muted">Dokumentasi momen berharga, teknologi inovatif, dan fasilitas canggih dari DENSO.</p>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm border-0 overflow-hidden" style="border-radius: 12px; transition: transform 0.2s, box-shadow 0.2s;">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top w-100" alt="{{ $gallery->title }}" style="height: 240px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark mb-2">{{ $gallery->title }}</h5>
                    @if($gallery->description)
                        <p class="card-text text-muted small">{{ $gallery->description }}</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-image" style="font-size: 2rem;"></i>
                <p class="mt-2 mb-0">Belum ada foto di galeri saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>

    @if($galleries->hasPages())
    <div class="mt-5 d-flex justify-content-center">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12) !important;
    }
</style>
@endsection

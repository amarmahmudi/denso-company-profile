@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    {{-- Stat: Artikel --}}
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label mb-1">Total Artikel</p>
                    <h2 class="stat-number mb-0">{{ $totalArticles }}</h2>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">📰</div>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="text-decoration-none small text-muted d-block mt-3">
                Kelola Artikel →
            </a>
        </div>
    </div>

    {{-- Stat: Produk --}}
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label mb-1">Total Produk</p>
                    <h2 class="stat-number mb-0">{{ $totalProducts }}</h2>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb, #f5576c);">📦</div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-decoration-none small text-muted d-block mt-3">
                Kelola Produk →
            </a>
        </div>
    </div>

    {{-- Stat: Galeri --}}
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label mb-1">Total Galeri</p>
                    <h2 class="stat-number mb-0">{{ $totalGalleries }}</h2>
                </div>
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">🖼️</div>
            </div>
            <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none small text-muted d-block mt-3">
                Kelola Galeri →
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header">
                <h5>Selamat Datang!</h5>
            </div>
            <div class="p-4">
                <p class="text-muted mb-0">
                    Halo, <strong>{{ auth()->user()->name }}</strong>! Ini adalah panel administrasi Company Profile DENSO. 
                    Gunakan menu di sidebar untuk mengelola konten website.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

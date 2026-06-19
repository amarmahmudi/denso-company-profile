@extends('layouts.app')

@section('title', 'DENSO - Crafting the Core')

@section('content')
<div class="hero-section">
    <div class="container">
        <h1 class="display-4 fw-bold">CRAFTING THE CORE</h1>
        <p class="lead mb-4">Mempersiapkan masa depan mobilitas dengan inovasi dan komitmen terhadap keberlanjutan.</p>
        <a href="{{ route('about') }}" class="btn btn-primary btn-lg px-4">Kenali Kami Lebih Dekat</a>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-primary mb-3">Solusi Mobilitas Lanjutan</h2>
            <p>Di DENSO, kami berdedikasi untuk menciptakan teknologi canggih, sistem dan produk yang membuat dunia lebih aman, lebih efisien, dan lebih ramah lingkungan. Inovasi kami terus mendorong batasan industri otomotif dan mobilitas.</p>
            <a href="{{ route('products') }}" class="btn btn-outline-danger">Jelajahi Produk Kami</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/denso_products.png') }}" alt="Mobility Solutions" class="img-fluid rounded shadow">
        </div>
    </div>

    <div class="row text-center mt-5">
        <div class="col-12 mb-4">
            <h3 class="fw-bold">Nilai-Nilai Kami</h3>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">Kualitas</h5>
                    <p class="card-text">Kami menetapkan standar tertinggi dalam setiap produk dan layanan untuk memastikan kepuasan pelanggan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">Inovasi</h5>
                    <p class="card-text">Melalui riset dan pengembangan berkelanjutan, kami menghadirkan teknologi terdepan untuk masa depan mobilitas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">Keberlanjutan</h5>
                    <p class="card-text">Berkomitmen pada perlindungan lingkungan dan penciptaan nilai sosial melalui operasi bisnis yang bertanggung jawab.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

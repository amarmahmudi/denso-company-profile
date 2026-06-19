@extends('layouts.app')

@section('title', 'Products & Services - DENSO')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Produk & Layanan Kami</h1>
        <p class="lead text-muted">Solusi inovatif untuk industri otomotif global yang lebih aman, nyaman, dan ramah lingkungan.</p>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 220px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                        <span class="text-muted">Tidak ada gambar</span>
                    </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <p class="card-text flex-grow-1 text-muted">{{ Str::limit($product->description, 120) }}</p>
                    <div class="mt-auto">
                        @if($product->price)
                            <p class="fw-bold text-danger mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        @endif
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-danger w-100">Detail Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada produk saat ini.</div>
        </div>
        @endforelse
    </div>

    @if($products->hasPages())
    <div class="mt-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection

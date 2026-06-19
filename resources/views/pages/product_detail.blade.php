@extends('layouts.app')

@section('title', $product->name . ' - DENSO')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-decoration-none text-muted">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product->name, 30) }}</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm overflow-hidden mt-4">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100" alt="{{ $product->name }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                        <span class="text-muted">Tidak ada gambar</span>
                    </div>
                @endif

                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h1 class="fw-bold h2 mb-0">{{ $product->name }}</h1>
                        @if($product->price)
                            <span class="badge bg-danger fs-5">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        @endif
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mb-3 text-primary">Deskripsi Produk</h5>
                    <div class="content text-muted" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('products') }}" class="btn btn-outline-secondary">&larr; Kembali ke Produk</a>
            </div>
        </div>
    </div>
</div>
@endsection

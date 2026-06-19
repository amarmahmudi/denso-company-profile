@extends('layouts.app')

@section('title', 'News - DENSO')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Berita & Pembaruan</h1>
        <p class="lead text-muted">Tetap update dengan informasi terbaru dan inovasi dari DENSO.</p>
    </div>

    <div class="row g-4">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body d-flex flex-column">
                    <p class="text-muted small mb-2"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}</p>
                    <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('news.show', $article->id) }}" class="btn btn-outline-danger mt-auto align-self-start">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada berita saat ini.</div>
        </div>
        @endforelse
    </div>

    <div class="mt-5">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

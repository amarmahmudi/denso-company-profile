@extends('layouts.app')

@section('title', $article->title . ' - DENSO')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news') }}" class="text-decoration-none text-muted">News</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 30) }}</li>
                </ol>
            </nav>

            <h1 class="fw-bold mb-3">{{ $article->title }}</h1>
            <p class="text-muted mb-4">Diterbitkan pada: {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}</p>

            @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded mb-4 w-100" alt="{{ $article->title }}">
            @endif

            <div class="content" style="line-height: 1.8; font-size: 1.1rem;">
                {!! nl2br(e($article->content)) !!}
            </div>

            <div class="mt-5">
                <a href="{{ route('news') }}" class="btn btn-outline-secondary">&larr; Kembali ke Berita</a>
            </div>
        </div>
    </div>
</div>
@endsection

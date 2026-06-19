@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('page-title', 'Kelola Artikel / Berita')

@section('content')
<div class="table-card">
    <div class="card-header">
        <h5>Daftar Artikel</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.articles.pdf') }}" target="_blank" class="btn btn-outline-secondary btn-sm">📄 Export PDF</a>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-denso btn-sm">+ Tambah Artikel</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Tanggal Terbit</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $index => $article)
                <tr>
                    <td>{{ $articles->firstItem() + $index }}</td>
                    <td>{{ Str::limit($article->title, 50) }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width:60px; height:40px; object-fit:cover; border-radius:6px;">
                        @else
                            <span class="text-muted small">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada artikel.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($articles->hasPages())
    <div class="p-3">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection

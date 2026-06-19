@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')

@section('content')
<div class="table-card">
    <div class="card-header">
        <h5>Daftar Galeri</h5>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-denso btn-sm">+ Tambah Gambar</a>
    </div>

    <div class="p-3">
        <div class="row g-3">
            @forelse($galleries as $gallery)
            <div class="col-md-3 col-sm-6">
                <div class="card border-0 shadow-sm h-100" style="border-radius:10px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height:180px; object-fit:cover;">
                    <div class="card-body p-3">
                        <h6 class="card-title fw-bold mb-1" style="font-size:0.9rem;">{{ Str::limit($gallery->title, 30) }}</h6>
                        @if($gallery->description)
                            <p class="card-text text-muted small mb-2">{{ Str::limit($gallery->description, 50) }}</p>
                        @endif
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm flex-fill">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center text-muted py-4">Belum ada gambar di galeri.</p>
            </div>
            @endforelse
        </div>
    </div>

    @if($galleries->hasPages())
    <div class="p-3">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection

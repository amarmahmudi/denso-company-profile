@extends('layouts.admin')

@section('title', 'Edit Gambar Galeri')
@section('page-title', 'Edit Gambar Galeri')

@section('content')
<div class="form-card">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label fw-semibold">Judul / Caption <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Gambar --}}
        <div class="mb-3">
            <label for="image" class="form-label fw-semibold">Gambar</label>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width:200px; height:130px; object-fit:cover; border-radius:8px;">
                <p class="small text-muted mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
            </div>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB.</small>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label for="description" class="form-label fw-semibold">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-denso">Update</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

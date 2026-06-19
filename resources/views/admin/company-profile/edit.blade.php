@extends('layouts.admin')

@section('title', 'Profil Perusahaan')
@section('page-title', 'Edit Profil Perusahaan')

@section('content')
<div class="form-card">
    <form action="{{ route('admin.company-profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Perusahaan --}}
        <div class="mb-3">
            <label for="company_name" class="form-label fw-semibold">Nama Perusahaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}" required>
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Deskripsi / Sejarah <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $profile->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Visi --}}
        <div class="mb-3">
            <label for="vision" class="form-label fw-semibold">Visi <span class="text-danger">*</span></label>
            <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3" required>{{ old('vision', $profile->vision) }}</textarea>
            @error('vision')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Misi --}}
        <div class="mb-3">
            <label for="mission" class="form-label fw-semibold">Misi <span class="text-danger">*</span></label>
            <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="3" required>{{ old('mission', $profile->mission) }}</textarea>
            @error('mission')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr class="my-4">
        <h6 class="fw-bold mb-3">Informasi Kontak</h6>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="address" class="form-label fw-semibold">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $profile->address) }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Telepon & Email --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-semibold">Telepon</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $profile->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-denso">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection

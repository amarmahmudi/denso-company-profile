@extends('layouts.app')

@section('title', 'About Us - DENSO')

@section('content')
<div class="bg-light py-5">
    <div class="container py-4">
        <h1 class="display-5 fw-bold text-primary mb-4 text-center">Tentang {{ $profile->company_name ?? 'DENSO' }}</h1>
        
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('images/denso_office.png') }}" alt="DENSO Office" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
                <h3 class="fw-bold mb-3">Tentang Perusahaan</h3>
                <p>{{ $profile->description ?? 'Didirikan pada tahun 1949 sebagai produsen komponen listrik otomotif, DENSO telah berkembang menjadi salah satu pemasok otomotif terbesar di dunia. Kami terus berinovasi dalam teknologi mobilitas dengan fokus pada keselamatan, lingkungan, dan kenyamanan.' }}</p>
                @if($profile && $profile->address)
                    <p><strong>Alamat:</strong> {{ $profile->address }}</p>
                @endif
                @if($profile && $profile->phone)
                    <p><strong>Telepon:</strong> {{ $profile->phone }}</p>
                @endif
                @if($profile && $profile->email)
                    <p><strong>Email:</strong> {{ $profile->email }}</p>
                @endif
            </div>
        </div>

        <div class="row mt-5 text-center">
            <div class="col-12 mb-4">
                <h3 class="fw-bold text-primary">Visi & Misi</h3>
            </div>
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white shadow-sm rounded h-100 border-top border-danger border-4">
                    <h4 class="fw-bold mb-3">Visi Kami</h4>
                    <p>{{ $profile->vision ?? 'Menciptakan masa depan di mana mobilitas yang aman dan ramah lingkungan tersedia untuk semua orang, dengan secara konsisten mengembangkan teknologi yang canggih dan inovatif.' }}</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white shadow-sm rounded h-100 border-top border-danger border-4">
                    <h4 class="fw-bold mb-3">Misi Kami</h4>
                    <p>{{ $profile->mission ?? 'Berkontribusi pada dunia yang lebih baik dengan menciptakan nilai bersama visi untuk masa depan, mendorong inisiatif yang memberdayakan masyarakat dan melestarikan lingkungan bumi.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

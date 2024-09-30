@extends('backend.layouts.app', ['title' => 'Detail Pendaftaran'])

@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Detail Pendaftaran</div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Informasi</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fasilitas-tab" data-bs-toggle="tab" href="#fasilitas" role="tab" aria-controls="fasilitas" aria-selected="false">Fasilitas</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="persyaratan-tab" data-bs-toggle="tab" href="#persyaratan" role="tab" aria-controls="persyaratan" aria-selected="false">Persyaratan</a>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <h5 class="mb-4">Informasi Pendaftaran</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Jenis:</strong> {{ $pendaftaran->jenis }}
                        </div>
                        <div class="col-md-6">
                            <strong>Nama Pelatihan:</strong> {{ $pendaftaran->pelatihan->nama_pelatihan }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tempat Pelatihan:</strong> {{ $pendaftaran->tempat_latihan }}
                        </div>
                        <div class="col-md-6">
                            <strong>No HP:</strong> {{ $pendaftaran->no_hp }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong> {{ $pendaftaran->email }}
                        </div>
                        <div class="col-md-6">
                            <strong>Periode Awal:</strong> {{ $pendaftaran->periode_awal }}
                        </div>
                        <div class="col-md-6">
                            <strong>Periode Akhir:</strong> {{ $pendaftaran->periode_akhir }}
                        </div>
                        <div class="col-md-6">
                            <strong>Kouta:</strong> {{ $pendaftaran->kouta }}
                        </div>
                        <div class="col-md-6">
                            <strong>Sifat:</strong> {{ $pendaftaran->sifat }}
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <span class="badge
                                @if($pendaftaran->status === 'dibuka') bg-success
                                @elseif($pendaftaran->status === 'ditutup') bg-danger
                                @elseif($pendaftaran->status === 'pending') bg-warning
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($pendaftaran->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="fasilitas" role="tabpanel" aria-labelledby="fasilitas-tab">
                    <h5 class="mb-4">Fasilitas</h5>
                    {!! $pendaftaran->fasilitas !!}
                </div>

                <div class="tab-pane fade" id="persyaratan" role="tabpanel" aria-labelledby="persyaratan-tab">
                    <h5 class="mb-4">Persyaratan</h5>
                    {!! $pendaftaran->persyaratan !!}
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pendaftaran.page_pendaftaran') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

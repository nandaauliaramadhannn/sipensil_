@extends('backend.layouts.app', ['title' => 'Buat Pendaftaran'])

@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Buat Pendaftaran Pelatihan</div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form id="permohonanForm" action="{{ route('pendaftaran.page_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" value="{{ Auth::user()->id }}" readonly>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pelatihan_id" class="form-label">Pilih Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-book'></i></span>
                            <select class="form-select @error('pelatihan_id') is-invalid @enderror" name="pelatihan_id" id="pelatihan_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($pelatihan as $item)
                                    <option value="{{ $item->id }}" {{ old('pelatihan_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_pelatihan }}</option>
                                @endforeach
                            </select>
                            @error('pelatihan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="jenis" class="form-label">Jenis Pelatihan</label>
                        <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" value="{{ old('jenis') }}" readonly>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tempat_latihan" class="form-label">Tempat Latihan</label>
                        <input type="text" name="tempat_latihan" class="form-control @error('tempat_latihan') is-invalid @enderror" id="tempat_latihan" value="{{ old('tempat_latihan') }}">
                        @error('tempat_latihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="persyaratan" class="form-label">Persyaratan</label>
                        <textarea name="persyaratan" class="form-control @error('persyaratan') is-invalid @enderror" id="persyaratan">{{ old('persyaratan') }}</textarea>
                        @error('persyaratan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas">{{ old('fasilitas') }}</textarea>
                        @error('fasilitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="periode_awal" class="form-label">Periode Awal</label>
                        <input type="date" name="periode_awal" class="form-control @error('periode_awal') is-invalid @enderror" id="periode_awal" value="{{ old('periode_awal') }}">
                        @error('periode_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="periode_akhir" class="form-label">Periode Akhir</label>
                        <input type="date" name="periode_akhir" class="form-control @error('periode_akhir') is-invalid @enderror" id="periode_akhir" value="{{ old('periode_akhir') }}">
                        @error('periode_akhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="kouta" class="form-label">Kouta</label>
                        <input type="text" name="kouta" class="form-control @error('kouta') is-invalid @enderror" id="kouta" value="{{ old('kouta') }}">
                        @error('kouta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="images" class="form-label">Upload Gambar</label>
                        <input type="file" name="images" class="form-control @error('images') is-invalid @enderror" id="images">
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="sifat" class="form-label">Sifat Pelatihan</label>
                        <select name="sifat" class="form-select @error('sifat') is-invalid @enderror" id="sifat">
                            <option value="">Pilih Sifat</option>
                            <option value="offline" {{ old('sifat') == 'offline' ? 'selected' : '' }}>Offline</option>
                            <option value="online" {{ old('sifat') == 'online' ? 'selected' : '' }}>Online</option>
                            <option value="blended Learning" {{ old('sifat') == 'blended Learning' ? 'selected' : '' }}>Blended Learning</option>
                            <option value="dll" {{ old('sifat') == 'dll' ? 'selected' : '' }}>Dll</option>
                        </select>
                        @error('sifat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                            <option value="">Pilih Status</option>
                            <option value="dibuka" {{ old('status') == 'dibuka' ? 'selected' : '' }}>Dibuka</option>
                            <option value="ditutup" {{ old('status') == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Buat Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
$(document).ready(function() {
    $('#pelatihan_id').on('change', function() {
        var pelatihanId = $(this).val();
        if (pelatihanId) {
            $.ajax({
                url: '/api/pelatihan/' + pelatihanId,
                type: 'GET',
                success: function(data) {
                    $('#jenis').val(data.kategori);
                },
                error: function() {
                    $('#jenis').val('');
                }
            });
        } else {
            $('#jenis').val('');
        }
    });

});
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#persyaratan'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#fasilitas'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const periodeAwal = document.getElementById('periode_awal');
        const periodeAkhir = document.getElementById('periode_akhir');

        periodeAkhir.addEventListener('change', function() {
            if (periodeAkhir.value < periodeAwal.value) {
                periodeAkhir.setCustomValidity('Tanggal akhir harus sama atau setelah tanggal awal.');
                periodeAkhir.reportValidity();
            } else {
                periodeAkhir.setCustomValidity('');
            }
        });

        periodeAwal.addEventListener('change', function() {
            if (periodeAkhir.value < periodeAwal.value) {
                periodeAkhir.setCustomValidity('Tanggal akhir harus sama atau setelah tanggal awal.');
                periodeAkhir.reportValidity();
            } else {
                periodeAkhir.setCustomValidity('');
            }
        });
    });
    </script>

@endsection

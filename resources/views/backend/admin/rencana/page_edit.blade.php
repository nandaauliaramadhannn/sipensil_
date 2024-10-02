@extends('backend.layouts.app', ['title' => 'Edit Rencana Pelatihan'])

@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-4">
        <div class="breadcrumb-title pe-3">Update Pelatihan</div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form id="permohonanForm" action="{{ route('admin.rencana.page_update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-building'></i></span>
                            <input type="text" name="nama_pelatihan" class="form-control @error('nama_pelatihan') is-invalid @enderror" id="nama_pelatihan" value="{{ old('nama_pelatihan', $pelatihan->nama_pelatihan) }}" required>
                            @error('nama_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta / Kuota Pelatihan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" name="jumlah_peserta" id="jumlah_peserta" value="{{ old('jumlah_peserta', $pelatihan->jumlah_peserta) }}" required>
                            @error('jumlah_peserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                    <div class="col-md-6">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-outline'></i></span>
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ (old('kategori_id', $pelatihan->kategori_id) == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="errorContainer" style="display:none; color:red;"></div>
                        <label for="rencana_pelatihan" class="form-label">Rencana Pelatihan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                            <input type="date" class="form-control @error('rencana_pelatihan') is-invalid @enderror" name="rencana_pelatihan" id="rencana_pelatihan" value="{{ old('rencana_pelatihan', $pelatihan->rencana_pelatihan) }}" required>
                            @error('rencana_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Update Pelatihan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

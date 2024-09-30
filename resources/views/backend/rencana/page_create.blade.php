@extends('backend.layouts.app', ['title' => 'Buat Rencana Pelatihan'])
@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Buat Pelatihan</div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form id="permohonanForm" action="{{ route('rencana.page_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-building'></i></span>
                            <input type="text" name="nama_pelatihan" class="form-control @error('nama_pelatihan') is-invalid @enderror" id="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required>
                            @error('nama_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta / Kouta Pelatihan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" name="jumlah_peserta" id="jumlah_peserta" value="{{ old('jumlah_peserta') }}" required>
                            @error('jumlah_peserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(auth()->user()->role === 'admin')
                    <div class="col-md-6">
                        <label for="selected_user_id" class="form-label">Pilih User</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-user'></i></span>
                            <select class="form-select @error('selected_user_id') is-invalid @enderror" name="selected_user_id" id="selected_user_id" required>
                                <option value="">Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('selected_user_id') == $user->id ? 'selected' : '' }}>{{ $user->nama_operator }}</option>
                                @endforeach
                            </select>
                            @error('selected_user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class='bx bx-outline'></i></span>
                            <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                            <input type="date" class="form-control @error('rencana_pelatihan') is-invalid @enderror" name="rencana_pelatihan" id="rencana_pelatihan" value="{{ old('rencana_pelatihan') }}" required>
                            @error('rencana_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#permohonanForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Get the form data
            let formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'), // The form's action URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success (e.g., redirect or show success message)
                    window.location.href = response.redirect; // Example of redirecting
                },
                error: function(xhr) {
                    // Handle validation errors
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        // Display error messages
                        if (errors.rencana_pelatihan) {
                            errorMessage += errors.rencana_pelatihan[0] + '<br>';
                        }

                        if (errors.selected_user_id) {
                            errorMessage += errors.selected_user_id[0] + '<br>';
                        }

                        // Show the error message (you can customize this)
                        $('#errorContainer').html(errorMessage).show();
                    }
                }
            });
        });
    });
</script>
@endpush

@extends('frontend.layouts.user')

@section('userdashboard')
<div class="col-lg-9">
    <div class="dashboard__content-wrap">
        <div class="dashboard__content-title">
            <h4 class="title">Pengaturan Profil</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
                        <div class="instructor__cover-bg" style="background-image: url('{{ asset('frontend/assets/img/backgorund.jpeg') }}');">
                            <div class="instructor__cover-info d-flex justify-content-start align-items-center">
                                <div class="instructor__cover-info-left">
                                    <div class="thumb rounded-circle overflow-hidden">
                                        <img src="{{asset('upload/user/'. $dataUser->photo)}}" alt="User Photo" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="instructor__profile-form-wrap">
                            <form action="{{ route('user.profile.update') }}" method="POST" class="instructor__profile-form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="1" {{ optional($dataUser)->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="2" {{ optional($dataUser)->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="{{ optional($dataUser)->tempat_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ optional($dataUser)->tanggal_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="pendidikan">Pendidikan</label>
                                            <input type="text" name="pendidikan" class="form-control" value="{{ optional($dataUser)->pendidikan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="umur">Usia</label>
                                            <input type="number" name="umur" class="form-control" value="{{ optional($dataUser)->umur }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="kecamatan">Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id" name="kecamatan_id">
                                                <option value="">Pilih Kecamatan</option>
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}" {{ optional($dataUser)->kecamatan_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="desa">Desa</label>
                                            <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id" value="{{ optional($dataUser)->desa_id }}" name="desa_id">
                                                <option value="">Pilih Desa</option>
                                            </select>
                                            @error('desa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="tinggi_badan">Tinggi Badan</label>
                                            <input type="text" name="tinggi_badan" class="form-control" value="{{ optional($dataUser)->tinggi_badan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="berat_badan">Berat Badan</label>
                                            <input type="text" name="berat_badan" class="form-control" value="{{ optional($dataUser)->berat_badan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="ktp">KTP (optional)</label>
                                            <input type="file" name="ktp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="ijazah">IJAZAH (optional)</label>
                                            <input type="file" name="ijazah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp mb-3">
                                            <label for="photo">Photo (optional)</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn mt-4">
                                    <button type="submit" class="btn btn-primary">Update Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#kecamatan_id').change(function() {
            var kecamatanId = $(this).val();
            if (kecamatanId) {
                $.ajax({
                    url: '{{ url("/get-data/desa") }}' + '/' + kecamatanId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#desa_id').empty().append('<option value="">Pilih Desa</option>');
                        $.each(data, function(key, value) {
                            $('#desa_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#desa_id').empty();
            }
        });
    });
</script>
@endpush

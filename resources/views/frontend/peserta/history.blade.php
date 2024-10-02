@extends('frontend.layouts.user')
@section('userdashboard')
<div class="col-lg-9">
    <div class="dashboard__content-wrap">
        <div class="dashboard__content-title">
            <h4 class="title">Pelatihan History</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dashboard__review-table">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelatihan</th>
                                <th>Sifat</th>
                                <th>Akhir Pelatihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historyPelatihan as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->pendaftaran->pelatihan->nama_pelatihan }}</td>
                                    <td>{{ $item->pendaftaran->sifat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->pendaftaran->periode_akhir)->format('d F Y') }}</td>

                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

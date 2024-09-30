@extends('backend.layouts.app', ['title' => 'Buat Rencana Pelatihan'])
@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Data Pendaftaran</div>
        <div class="ms-auto">
            <a href="{{route('pendaftaran.page_create')}}" class="btn btn-primary">Tambah Pendaftaran</a>
        </div>
    </div>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lembaga</th>
                            <th>Nama Pelatihan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->lembaga->name }}</td>
                            <td>{{ $item->pelatihan->nama_pelatihan }}</td>
                            <td>
                                @if($item->status === 'dibuka')
                                    <span class="badge bg-success">Dibuka</span>
                                @elseif($item->status === 'ditutup')
                                    <span class="badge bg-danger">Ditutup</span>
                                @elseif($item->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Dikenal</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{route('pendaftaran.page_show', $item->id)}}" class="btn btn-dark btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

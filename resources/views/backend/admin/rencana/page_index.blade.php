@extends('backend.layouts.app', ['title' => 'Rencana Pelatihan'])

@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Data Pelatihan</div>
        <div class="ms-auto">
            <a href="{{route('admin.rencana.page_create')}}" class="btn btn-primary">Tambah Pelatihan</a>
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
                            <th>Nama Pelatihan</th>
                            <th>Jenis Pelatihan</th>
                            <th>Kouta Pelatihan</th>
                            <th>Rencana Pelatihan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pelatihans->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pelatihan.</td>
                        </tr>
                        @else
                        @foreach ($pelatihans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pelatihan }}</td>
                            <td>{{ $item->kategori->name }}</td>
                            <td>{{ $item->jumlah_peserta }}</td>
                            <td>{{ $item->rencana_pelatihan }}</td>
                                    <td class="text-right">
                                        <form action="{{ route('admin.rencana.page_delete', $item->id) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.rencana.page_edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

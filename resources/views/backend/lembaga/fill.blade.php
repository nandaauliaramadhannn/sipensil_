@extends('backend.layouts.app', ['title' => 'Isi Lembaga ID'])
@section('content')
<div class="container">
    <h2>Isi Lembaga ID</h2>
    <form action="{{ route('lembaga.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Lembaga ID</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

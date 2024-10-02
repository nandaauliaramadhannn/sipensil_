@extends('backend.layouts.app', ['title' => 'Dashboard'])
@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Pelatihan</p>
                        <h4 class="my-1">{{$totalpelatihan}}</h4>
                    </div>
                    <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

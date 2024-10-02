@php
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Redis;
    $pendaftaran = \App\Models\Pendaftran::paginate(10);
    $user  = \App\Models\User::where('role', 'user')->count();

    $keys = Redis::keys('laravel_cache:visitor_*');

    $activeVisitors = collect($keys)->count();
@endphp
<footer class="footer__area footer__area-five">
    <div class="footer__top footer__top-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <table id="example" class="table table-striped table-bordered text-center bg-light" style="width: 100%;">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Lembaga</th>
                                <th>Nama Pelatihan</th>
                                <th>Status</th>
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
                                        <span class="badge bg-success text-white">Dibuka</span>
                                    @elseif($item->status === 'ditutup')
                                        <span class="badge bg-danger text-white">Ditutup</span>
                                    @elseif($item->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-secondary text-white">Tidak Dikenal</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom footer__bottom-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="copy-right-text d-flex justify-content-between">
                        <p>Jumlah Pengunjung: {{$activeVisitors }}</p>
                        <p>Jumlah Pelatiahan: {{ $pendaftaran->total() }}</p>
                        <p>Jumlah Peserta Pelatihan: {{ $user }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="copy-right-text">
                        <p>© copyright {{date('Y')}}. {{config('app.name')}} All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer__bottom-menu">
                        <ul class="list-wrap">
                            <li><a href="contact.html">Term of Use</a></li>
                            <li><a href="contact.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

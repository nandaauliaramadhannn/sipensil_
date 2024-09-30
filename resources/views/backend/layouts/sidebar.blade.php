<ul class="metismenu" id="menu">
    @can('admin')
    <li>
        <a href="{{route('admin.dashboard')}}">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    @endcan
    @can('lembaga')
    <li>
        <a href="{{route('lembaga.dashboard')}}">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    @endcan
    <li class="menu-label">Management Pelatihan</li>
    <li>
        <a href="{{ route('rencana.page_index')}}">
            <div class="parent-icon"><i class='bx bx-detail'></i>
            </div>
            <div class="menu-title">Rencana Pelatihan</div>
        </a>
    </li>
    <li>
        <a href="{{route('pendaftaran.page_pendaftaran')}}">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Pendaftaran Pelatihan</div>
        </a>
    </li>
    @can('admin')
    <li>
        <a href="{{route('admin.kategori')}}">
            <div class="parent-icon"><i class='bx bx-category'></i>
            </div>
            <div class="menu-title">Kategori Pelatihan</div>
        </a>
    </li>
    @endcan
    @can('admin')
    <li class="menu-label">Management Website</li>
    <li>
        <a href="{{route('admin.silder')}}">
            <div class="parent-icon"><i class='bx bx-image'></i>
            </div>
            <div class="menu-title">Slider</div>
        </a>
    </li>
    @endcan
</ul>

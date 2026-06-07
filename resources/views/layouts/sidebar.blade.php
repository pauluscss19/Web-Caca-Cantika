{{-- Sidebar partial - digunakan di semua halaman dashboard --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <h2>MyAset</h2>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-grip"></i></span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('monitoring') }}" class="{{ request()->routeIs('monitoring') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                Monitoring
            </a>
        </li>
        <li>
            <a href="{{ route('visualisasi') }}" class="{{ request()->routeIs('visualisasi') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-layer-group"></i></span>
                Visualisasi
            </a>
        </li>
        <li>
            <a href="{{ route('filtering') }}" class="{{ request()->routeIs('filtering') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-filter"></i></span>
                Filtering
            </a>
        </li>
        <li>
            <a href="{{ route('laporan-aset') }}" class="{{ request()->routeIs('laporan-aset') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-file-lines"></i></span>
                Laporan Aset
            </a>
        </li>
        <li>
            <a href="{{ route('manajemen-pengguna') }}" class="{{ request()->routeIs('manajemen-pengguna') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-bullseye"></i></span>
                Manajemen Pengguna
            </a>
        </li>
        <li>
            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fa-solid fa-lock"></i></span>
                FAQ
            </a>
        </li>
    </ul>
</aside>

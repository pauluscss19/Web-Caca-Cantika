<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard - MyAset KPKNL Surabaya">
    <title>Dashboard - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Top Bar --}}
            <div class="top-bar">
                <div class="welcome-text">
                    <h1>Welcome, {{ explode(' ', Auth::user()->name)[0] }}</h1>
                    <p>Selamat datang kembali! Berikut ringkasan aset hari ini.</p>
                </div>
                <div class="top-bar-actions">
                    <button class="profile-btn" id="profile-toggle" onclick="toggleProfileDropdown()" style="padding: 0; overflow: hidden;">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/profiles/' . Auth::user()->photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fa-regular fa-user" style="margin: 10px;"></i>
                        @endif
                    </button>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn" id="btn-logout" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>

                    {{-- Profile Dropdown --}}
                    <div class="profile-dropdown" id="profile-dropdown">
                        <div class="profile-dropdown-header">
                            <div class="profile-dropdown-avatar" style="padding: 0; overflow: hidden; border-radius: 50%;">
                                @if(Auth::user()->photo)
                                    <img src="{{ asset('storage/profiles/' . Auth::user()->photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fa-regular fa-user" style="margin: 12px;"></i>
                                @endif
                            </div>
                            <div class="profile-dropdown-name">{{ Auth::user()->name }}</div>
                        </div>
                        <ul class="profile-dropdown-menu">
                            <li>
                                <a href="#">
                                    <span class="dropdown-icon"><i class="fa-regular fa-eye"></i></span>
                                    Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profil') }}">
                                    <span class="dropdown-icon"><i class="fa-solid fa-pen"></i></span>
                                    Edit Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Date Card --}}
            <div class="date-card">
                <div class="date-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div class="date-info">
                    <div class="day" id="current-day">Rabu</div>
                    <div class="date" id="current-date">12 April 2026</div>
                </div>
            </div>

            {{-- Stats Row --}}
            <div class="stats-row">
                <a href="{{ route('total-aset') }}" style="text-decoration: none; color: inherit;">
                    <div class="stat-card">
                        <div class="stat-icon total">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-title">Total Aset</div>
                            <div class="stat-value">{{ $totalAset }}</div>
                            <div class="stat-desc">Aset Tersedia</div>
                        </div>
                    </div>
                </a>
                <div class="stat-card">
                    <div class="stat-icon active">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Aset Aktif</div>
                        <div class="stat-value">{{ $kondisiBaik }}</div>
                        <div class="stat-desc">{{ $pctAktif }}% dari yang tersedia</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon broken">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Aset Rusak</div>
                        <div class="stat-value">{{ $totalRusak }}</div>
                        <div class="stat-desc">{{ $pctRusak }}% dari total semua aset</div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="quick-actions">
                <a href="{{ route('visualisasi') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <span>Visualisasi</span>
                </a>
                <a href="{{ route('laporan-aset') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <span>Laporan Aset</span>
                </a>
                <a href="{{ route('laporan-aset') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <span>Tambah Aset</span>
                </a>
            </div>
        </main>
    </div>

    <script>
        // Toggle profile dropdown
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('profile-dropdown');
            const profileBtn = document.getElementById('profile-toggle');
            if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Dynamic date
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const now = new Date();
        document.getElementById('current-day').textContent = days[now.getDay()];
        document.getElementById('current-date').textContent = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KPKNL Surabaya - Kantor Pelayanan Kekayaan Negara dan Lelang Surabaya">
    <title>KPKNL Surabaya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="welcome-container">
        {{-- Background Image dari public --}}
        <img src="{{ asset('images/bg-landing.png') }}" alt="Background KPKNL Surabaya" class="bg-image">
        <div class="overlay"></div>

        <div class="content-wrapper">
            {{-- Logo Kemenkeu --}}
            <div class="kemenkeu-logo">
                <div class="logo-text">
                    <strong>KEMENKEU</strong><br>
                    KEMENTERIAN KEUANGAN<br>
                    REPUBLIK INDONESIA
                </div>
            </div>

            {{-- Judul Utama --}}
            <div class="main-title">
                <h1>KPKNL<br><span class="surabaya">SURABAYA</span></h1>
                <p class="subtitle">Profesional, Akuntabel, Sinergi, Transparan, Inovatif</p>
            </div>

            {{-- Motto Box --}}
            <div class="motto-box">
                <p>Melayani dengan<br>
                <span class="highlight">INTEGRITAS,</span><br>
                <span class="highlight">MENGAMANKAN</span> dengan<br>
                <span class="highlight">PROFESIONALITAS</span></p>
            </div>
        </div>

        {{-- Tombol START --}}
        <div class="start-btn-wrapper">
            <a href="{{ route('login') }}">
                <button class="start-btn" id="btn-start">START</button>
            </a>
        </div>

        {{-- Nilai-nilai di bawah --}}
        <div class="values-bar">
            <div class="value-item">
                <div class="icon"><i class="fa-solid fa-chart-column"></i></div>
                <span>Profesional</span>
            </div>
            <div class="value-item">
                <div class="icon"><i class="fa-solid fa-handshake"></i></div>
                <span>Akuntabel</span>
            </div>
            <div class="value-item">
                <div class="icon"><i class="fa-solid fa-people-group"></i></div>
                <span>Sinergi</span>
            </div>
            <div class="value-item">
                <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                <span>Transparan</span>
            </div>
            <div class="value-item">
                <div class="icon"><i class="fa-solid fa-lightbulb"></i></div>
                <span>Inovatif</span>
            </div>
        </div>
    </div>
</body>
</html>

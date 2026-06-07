<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login - KPKNL Surabaya MyAset">
    <title>Login - KPKNL Surabaya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        {{-- Background Image dari public --}}
        <img src="{{ asset('images/bg-landing.png') }}" alt="Background KPKNL Surabaya" class="bg-image">
        <div class="overlay"></div>

        {{-- Konten Kiri --}}
        <div class="left-content">
            {{-- Logo Kemenkeu --}}
            <div class="kemenkeu-logo">
                <div class="logo-text">
                    <strong>KEMENKEU</strong><br>
                    KEMENTERIAN KEUANGAN<br>
                    REPUBLIK INDONESIA
                </div>
            </div>

            {{-- Judul --}}
            <div class="main-title">
                <h1>KPKNL<br><span class="surabaya">SURABAYA</span></h1>
                <p class="subtitle">Profesional, Akuntabel, Sinergi, Transparan, Inovatif</p>
            </div>

            {{-- Motto --}}
            <div class="motto-box">
                <p>Melayani dengan<br>
                <span class="highlight">INTEGRITAS,</span><br>
                <span class="highlight">MENGAMANKAN</span> dengan<br>
                <span class="highlight">PROFESIONALITAS</span></p>
            </div>
        </div>

        {{-- Login Card --}}
        <div class="login-card-wrapper">
            <div class="login-card-bg">
                <div class="login-card">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login.process') }}" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <span style="color: #dc2626; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="login-btn" id="btn-login">Login</button>
                    </form>
                </div>
            </div>
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

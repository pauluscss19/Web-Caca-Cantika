<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Visualisasi Aset - MyAset KPKNL Surabaya">
    <title>Visualisasi - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/visualisasi.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Top Bar --}}
            <div class="top-bar">
                <h1 class="page-title">Visualisasi</h1>
                <div class="top-bar-actions">
                    <button class="profile-btn" id="profile-toggle" style="padding: 0; overflow: hidden;">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/profiles/' . Auth::user()->photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fa-regular fa-user" style="margin: 10px;"></i>
                        @endif
                    </button>
                    <button class="settings-btn" id="btn-settings">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                </div>
            </div>

            {{-- Stats Row --}}
            <div class="stats-row">
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
                <div class="stat-card">
                    <div class="stat-icon active">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Aset Aktif</div>
                        <div class="stat-desc">{{ $pctAktif }}% dari yang tersedia</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon broken">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Aset Rusak</div>
                        <div class="stat-desc">{{ $pctRusak }}% dari total semua aset</div>
                    </div>
                </div>
            </div>

            {{-- Chart and Table Row --}}
            <div class="content-row">
                {{-- Donut Chart --}}
                <div class="chart-card">
                    <h3 class="card-title">Status Aset</h3>
                    <div class="chart-wrapper">
                        <canvas id="statusChart" width="220" height="220"></canvas>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot aktif"></span>
                                <span class="legend-label">Aset Aktif</span>
                                <span class="legend-value">{{ $kondisiBaik }} ({{ $pctBaik }}%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot rusak"></span>
                                <span class="legend-label">Aset Rusak</span>
                                <span class="legend-value">{{ $kondisiRusakBerat }} ({{ $pctRusakBeratChart }}%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot perbaikan"></span>
                                <span class="legend-label">Dalam Perbaikan</span>
                                <span class="legend-value">{{ $kondisiRusakRingan }} ({{ $pctPerbaikan }}%)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Aset Terbaru Table --}}
                <div class="table-card">
                    <h3 class="card-title">Aset Terbaru</h3>
                    <table class="data-table" id="aset-terbaru-table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Tahun</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asetTerbaru as $aset)
                            <tr>
                                <td>
                                    @if($aset->gambar)
                                        <img src="{{ asset('storage/assets/' . $aset->gambar) }}" alt="Gambar {{ $aset->nama_aset }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #e0e0e0; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #888;">No Img</div>
                                    @endif
                                </td>
                                <td>{{ $aset->nama_aset }}</td>
                                <td>{{ $aset->kategori }}</td>
                                <td>{{ $aset->tahun_perolehan }}</td>
                                <td>{{ ucfirst($aset->kondisi) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;color:#888;">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Aset Rusak Section --}}
            <div class="rusak-section">
                <div class="rusak-header">
                    <h3 class="rusak-title">Aset Rusak</h3>
                    <p class="rusak-subtitle">Status Aset dalam bentuk uraian</p>
                </div>

                @if($asetRusak->count() > 0)
                <table class="rusak-table" id="aset-rusak-table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Aset</th>
                            <th>Kategori</th>
                            <th>Lokasi (Satker)</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asetRusak as $aset)
                        <tr>
                            <td>
                                @if($aset->gambar)
                                    <img src="{{ asset('storage/assets/' . $aset->gambar) }}" alt="Gambar {{ $aset->nama_aset }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #e0e0e0; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #888;">No Img</div>
                                @endif
                            </td>
                            <td class="aset-name">{{ $aset->nama_aset }}</td>
                            <td>{{ $aset->kategori }}</td>
                            <td>{{ $aset->satker ? $aset->satker->nama_satker . ' - ' . $aset->satker->alamat : '-' }}</td>
                            <td>{{ ucfirst($aset->kondisi) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <p>Tidak ada aset dengan kondisi rusak.</p>
                </div>
                @endif
            </div>
        </main>
    </div>

    <script>
        // Donut Chart - Pure Canvas
        (function() {
            var canvas = document.getElementById('statusChart');
            var ctx = canvas.getContext('2d');
            var dpr = window.devicePixelRatio || 1;
            var size = 220;
            canvas.width = size * dpr;
            canvas.height = size * dpr;
            canvas.style.width = size + 'px';
            canvas.style.height = size + 'px';
            ctx.scale(dpr, dpr);

            var centerX = size / 2;
            var centerY = size / 2;
            var radius = 85;
            var innerRadius = 55;

            var data = [
                { value: {{ $pctBaik }}, color: '#3366CC' },
                { value: {{ $pctRusakBeratChart }}, color: '#FF6B6B' },
                { value: {{ $pctPerbaikan }}, color: '#FFD93D' }
            ];

            var startAngle = -Math.PI / 2;

            data.forEach(function(segment) {
                if (segment.value <= 0) return;
                var sliceAngle = (segment.value / 100) * 2 * Math.PI;
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, startAngle, startAngle + sliceAngle);
                ctx.arc(centerX, centerY, innerRadius, startAngle + sliceAngle, startAngle, true);
                ctx.closePath();
                ctx.fillStyle = segment.color;
                ctx.fill();
                startAngle += sliceAngle;
            });

            // Center text
            ctx.fillStyle = '#333';
            ctx.font = '600 14px Poppins, sans-serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText('{{ $pctBaik }}%', centerX, centerY);
        })();
    </script>
</body>
</html>

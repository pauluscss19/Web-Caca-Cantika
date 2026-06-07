<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Filtering Aset - MyAset KPKNL Surabaya">
    <title>Filtering - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/filtering.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Page Header --}}
            <h1 class="page-title">Filtering</h1>

            {{-- Filter Form --}}
            <div class="filter-card">
                <form action="{{ route('filtering') }}" method="GET" id="filter-form">
                    <div class="filter-grid">
                        {{-- Kategori Aset --}}
                        <div class="filter-group">
                            <label class="filter-label" for="kategori">Kategori Aset</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-solid fa-grip"></i></span>
                                <select name="kategori" id="kategori" class="filter-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($kategoris as $kat)
                                    <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Status / Kondisi Aset --}}
                        <div class="filter-group">
                            <label class="filter-label" for="kondisi">Kondisi Aset</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-regular fa-square-check"></i></span>
                                <select name="kondisi" id="kondisi" class="filter-select">
                                    <option value="">Semua Kondisi</option>
                                    @foreach ($kondisis as $kond)
                                    <option value="{{ $kond }}" {{ request('kondisi') == $kond ? 'selected' : '' }}>{{ ucfirst($kond) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="filter-group">
                            <label class="filter-label" for="lokasi">Lokasi</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <input type="text" name="lokasi" id="lokasi" class="filter-input" placeholder="Semua Lokasi" value="{{ request('lokasi') }}">
                            </div>
                        </div>

                        {{-- Tahun Peroleh --}}
                        <div class="filter-group">
                            <label class="filter-label" for="tahun">Tahun Peroleh</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-regular fa-calendar"></i></span>
                                <input type="number" name="tahun" id="tahun" class="filter-input" placeholder="Tahun (cth: 2022)" value="{{ request('tahun') }}" min="2000" max="2030">
                            </div>
                        </div>

                        {{-- Nilai Min --}}
                        <div class="filter-group">
                            <label class="filter-label" for="nilai_min">Nilai Aset (Min)</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-regular fa-circle-check"></i></span>
                                <input type="number" name="nilai_min" id="nilai_min" class="filter-input" placeholder="Nilai minimum" value="{{ request('nilai_min') }}">
                            </div>
                        </div>

                        {{-- Nilai Max --}}
                        <div class="filter-group">
                            <label class="filter-label" for="nilai_max">Nilai Aset (Max)</label>
                            <div class="input-wrapper">
                                <span class="input-icon"><i class="fa-regular fa-circle-check"></i></span>
                                <input type="number" name="nilai_max" id="nilai_max" class="filter-input" placeholder="Nilai maksimum" value="{{ request('nilai_max') }}">
                            </div>
                        </div>
                    </div>

                    {{-- Search Button --}}
                    <div class="filter-actions">
                        <button type="submit" class="btn-cari" id="btn-cari">Cari</button>
                    </div>
                </form>
            </div>

            {{-- Results Table --}}
            @if ($hasFilter)
            <div class="results-card">
                <h3 class="results-title">Hasil Filter ({{ $results->count() }} data)</h3>
                @if ($results->count() > 0)
                <table class="results-table" id="results-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Nilai Perolehan</th>
                            <th>Tahun</th>
                            <th>Kondisi</th>
                            <th>Satker</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $i => $aset)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $aset->nama_aset }}</td>
                            <td>{{ $aset->kategori }}</td>
                            <td>Rp {{ number_format($aset->nilai_perolehan, 0, ',', '.') }}</td>
                            <td>{{ $aset->tahun_perolehan }}</td>
                            <td>{{ ucfirst($aset->kondisi) }}</td>
                            <td>{{ $aset->satker ? $aset->satker->nama_satker : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <p>Tidak ada aset yang sesuai dengan filter.</p>
                </div>
                @endif
            </div>
            @endif
        </main>
    </div>
</body>
</html>

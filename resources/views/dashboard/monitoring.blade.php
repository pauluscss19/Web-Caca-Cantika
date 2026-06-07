<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Monitoring Aset - MyAset KPKNL Surabaya">
    <title>Monitoring - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/monitoring.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Page Header --}}
            <div class="page-header">
                <h1>Jumlah Aset Aktif</h1>
                <p>Menampilkan jumlah aset yang terdaftar</p>
            </div>

            {{-- Data Table --}}
            <div class="data-table-wrapper">
                <table class="data-table" id="aset-table">
                    <thead>
                        <tr>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asets as $aset)
                        <tr>
                            <td>{{ $aset->nama_aset }}</td>
                            <td>{{ $aset->kategori }}</td>
                            <td>{{ $aset->satker ? $aset->satker->alamat : '-' }}</td>
                            <td>{{ ucfirst($aset->kondisi) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align:center;color:#888;">Belum ada data aset</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="pagination-wrapper">
                    <div class="pagination-info">Menampilkan {{ $asets->count() }} dari {{ $asets->count() }} data Aset</div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

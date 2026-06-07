<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Aset - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/total-aset.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            <h1 class="page-title">Total Aset</h1>

            <div class="table-card">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Kondisi</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asets as $aset)
                        <tr>
                            <td>{{ $aset->nama_aset }}</td>
                            <td>{{ $aset->kategori }}</td>
                            <td>{{ strtolower($aset->kondisi) === 'baik' ? 'baik' : 'cukup baik' }}</td>
                            <td>{{ $aset->jumlah }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Belum ada data aset</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                <div class="pagination-info">
                    @if ($asets->total() > 0)
                        Menampilkan {{ $asets->firstItem() }}-{{ $asets->lastItem() }} dari {{ $asets->total() }} data Aset
                    @else
                        Menampilkan 0 data Aset
                    @endif
                </div>
                
                @if ($asets->hasPages())
                <div class="pagination-controls">
                    {{-- Previous Page Link --}}
                    @if ($asets->onFirstPage())
                        <span class="pagination-btn disabled">&lt;</span>
                    @else
                        <a href="{{ $asets->previousPageUrl() }}" class="pagination-btn">&lt;</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($asets->getUrlRange(1, $asets->lastPage()) as $page => $url)
                        @if ($page == $asets->currentPage())
                            <span class="pagination-page active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagination-page">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($asets->hasMorePages())
                        <a href="{{ $asets->nextPageUrl() }}" class="pagination-btn">&gt;</a>
                    @else
                        <span class="pagination-btn disabled">&gt;</span>
                    @endif
                </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>

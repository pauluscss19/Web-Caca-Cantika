<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Laporan Aset - MyAset KPKNL Surabaya">
    <title>Laporan Aset - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/laporan-aset.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Page Header --}}
            <div class="page-header">
                <h1 class="page-title">Laporan Aset</h1>
                <button type="button" class="btn-ekspor" id="btn-ekspor" onclick="window.print()">
                    <i class="fa-solid fa-file-pdf"></i>
                    Ekspor PDF
                </button>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
            <div class="alert-success" id="alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- Form Tambah Aset --}}
            <div class="form-card">
                <form action="{{ route('laporan-aset.store') }}" method="POST" id="form-laporan" enctype="multipart/form-data">
                    @csrf
                    {{-- Nama Aset --}}
                    <div class="form-group">
                        <label class="form-label" for="nama_aset">Nama Aset</label>
                        <input type="text" name="nama_aset" id="nama_aset" class="form-input" placeholder="Nama aset" required value="{{ old('nama_aset') }}">
                        @error('nama_aset')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="form-group">
                        <label class="form-label" for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-input" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Tanah" {{ old('kategori') == 'Tanah' ? 'selected' : '' }}>Tanah</option>
                            <option value="Bangunan" {{ old('kategori') == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                            <option value="Kendaraan" {{ old('kategori') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Peralatan" {{ old('kategori') == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                        </select>
                        @error('kategori')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Nilai Perolehan --}}
                    <div class="form-group">
                        <label class="form-label" for="nilai_perolehan">Nilai Perolehan</label>
                        <input type="number" name="nilai_perolehan" id="nilai_perolehan" class="form-input" placeholder="Nilai Perolehan (Rp)" required value="{{ old('nilai_perolehan') }}">
                        @error('nilai_perolehan')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tahun Peroleh --}}
                    <div class="form-group">
                        <label class="form-label" for="tahun_perolehan">Tahun Peroleh</label>
                        <input type="number" name="tahun_perolehan" id="tahun_perolehan" class="form-input" placeholder="Tahun (cth: 2024)" min="2000" max="2030" required value="{{ old('tahun_perolehan') }}">
                        @error('tahun_perolehan')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Kondisi --}}
                    <div class="form-group">
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-input" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak ringan" {{ old('kondisi') == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="rusak berat" {{ old('kondisi') == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Satker --}}
                    <div class="form-group">
                        <label class="form-label" for="satker_id">Satuan Kerja</label>
                        <select name="satker_id" id="satker_id" class="form-input" required>
                            <option value="">Pilih Satker</option>
                            @php
                                $satkers = \App\Models\Satker::all();
                            @endphp
                            @foreach ($satkers as $satker)
                            <option value="{{ $satker->id }}" {{ old('satker_id') == $satker->id ? 'selected' : '' }}>{{ $satker->nama_satker }}</option>
                            @endforeach
                        </select>
                        @error('satker_id')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="gambar">Gambar Aset (Opsional)</label>
                        <input type="file" name="gambar" id="gambar" class="form-input" accept="image/jpeg,image/png,image/jpg" style="padding: 6px;">
                        @error('gambar')
                        <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-buat" id="btn-buat">Buat</button>
                    </div>
                </form>
            </div>

            {{-- Daftar Aset --}}
            <div class="table-card">
                <h3 class="table-title">Daftar Aset ({{ $asets->count() }} data)</h3>
                <div class="table-wrapper">
                    <table class="aset-table" id="aset-list-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Nilai Perolehan</th>
                                <th>Tahun</th>
                                <th>Kondisi</th>
                                <th>Satker</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asets as $i => $aset)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    @if($aset->gambar)
                                        <img src="{{ asset('storage/assets/' . $aset->gambar) }}" alt="Gambar" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <div style="width: 40px; height: 40px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999;">-</div>
                                    @endif
                                </td>
                                <td>{{ $aset->nama_aset }}</td>
                                <td>{{ $aset->kategori }}</td>
                                <td>Rp {{ number_format($aset->nilai_perolehan, 0, ',', '.') }}</td>
                                <td>{{ $aset->tahun_perolehan }}</td>
                                <td>{{ ucfirst($aset->kondisi) }}</td>
                                <td>{{ $aset->satker ? $aset->satker->nama_satker : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align:center;color:#888;">Belum ada data aset</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

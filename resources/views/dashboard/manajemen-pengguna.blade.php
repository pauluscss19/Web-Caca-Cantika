<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manajemen Pengguna - MyAset KPKNL Surabaya">
    <title>Manajemen Pengguna - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/manajemen-pengguna.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            {{-- Page Header --}}
            <h1 class="page-title">Manajemen Pengguna</h1>

            {{-- Success Message --}}
            @if (session('success'))
            <div class="alert-success" id="alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- Form Manajemen --}}
            <div class="form-card">
                <form action="{{ route('manajemen-pengguna.update') }}" method="POST" id="form-pengguna">
                    @csrf
                    {{-- Pilih User --}}
                    <div class="form-group">
                        <label class="form-label" for="user_id">Pilih Pengguna</label>
                        <select name="user_id" id="user_id" class="form-input" required>
                            <option value="">Pilih pengguna</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }}) - {{ ucfirst($user->role) }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ubah Password --}}
                    <div class="form-group">
                        <label class="form-label" for="password">Ubah Password</label>
                        <input type="password" name="password" id="password" class="form-input" placeholder="Password baru (kosongkan jika tidak diubah)">
                    </div>

                    {{-- Username --}}
                    <div class="form-group">
                        <label class="form-label" for="name">Username</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder="Username baru (kosongkan jika tidak diubah)">
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-ubah" id="btn-ubah">Ubah</button>
                    </div>
                </form>
            </div>

            {{-- Daftar Users --}}
            <div class="table-card">
                <h3 class="table-title">Daftar Pengguna ({{ $users->count() }})</h3>
                <div class="table-wrapper">
                    <table class="users-table" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $i => $user)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align:center;color:#888;">Belum ada pengguna</td>
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

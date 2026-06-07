<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edit Profil - MyAset KPKNL Surabaya">
    <title>Edit Profil - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            <h1 class="page-title">Edit Profil</h1>

            {{-- Success Message --}}
            @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="profile-card">
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" id="profil-form" style="display: flex; gap: 32px; width: 100%; flex-wrap: wrap;">
                    @csrf
                    
                    {{-- Photo Section --}}
                    <div class="profile-photo-section">
                        <div class="photo-preview">
                            @if(Auth::user()->photo)
                                <img src="{{ asset('storage/profiles/' . Auth::user()->photo) }}" alt="Profile Photo" id="preview-img">
                            @else
                                <i class="fa-solid fa-user" id="preview-icon"></i>
                                <img src="" alt="Profile Photo" id="preview-img" style="display: none;">
                            @endif
                        </div>
                        <div class="btn-upload-wrap">
                            <span class="btn-upload">Pilih Foto</span>
                            <input type="file" name="photo" id="photo" class="file-input" accept="image/jpeg,image/png,image/jpg" onchange="previewImage(this)">
                        </div>
                        @error('photo')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Form Section --}}
                    <div class="profile-form-section">
                        {{-- Name --}}
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-input" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-input" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label class="form-label" for="password">Password Baru (Opsional)</label>
                            <input type="password" name="password" id="password" class="form-input" placeholder="Kosongkan jika tidak ingin mengubah password">
                            @error('password')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('preview-img');
                    var icon = document.getElementById('preview-icon');
                    
                    img.src = e.target.result;
                    img.style.display = 'block';
                    
                    if (icon) {
                        icon.style.display = 'none';
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>

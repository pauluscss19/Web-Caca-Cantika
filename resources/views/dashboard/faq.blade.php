<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FAQ - MyAset KPKNL Surabaya">
    <title>FAQ - MyAset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="main-content">
            <h1 class="page-title">FAQ</h1>

            <div class="faq-card">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Apa itu MyAset?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>MyAset adalah sistem manajemen aset yang digunakan untuk mengelola, memantau, dan melaporkan aset yang dimiliki oleh KPKNL Surabaya.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara menambah aset baru?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Anda dapat menambah aset baru melalui menu Laporan Aset, kemudian isi form yang tersedia dan klik tombol Buat.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara mengubah password?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Silakan masuk ke menu Manajemen Pengguna, kemudian masukkan password baru pada kolom Ubah Password dan klik Ubah.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara melakukan filtering aset?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Gunakan menu Filtering untuk menyaring aset berdasarkan kategori, status, kondisi, lokasi, tanggal peroleh, dan nilai aset.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara mengekspor laporan aset?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pada halaman Laporan Aset, klik tombol Ekspor PDF yang berwarna hijau di pojok kanan atas untuk mengunduh laporan dalam format PDF.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleFaq(el) {
            var item = el.parentElement;
            item.classList.toggle('open');
        }
    </script>
</body>
</html>

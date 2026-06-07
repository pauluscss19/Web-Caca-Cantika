<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Satker;
use App\Models\Lelang;
use App\Models\Piutang;
use App\Models\BarangAsetMasuk;
use App\Models\User;

// Halaman Welcome / Landing
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Guest Routes
Route::middleware('guest')->group(function () {
    // Halaman Login
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    // Proses Login
    Route::post('/login', function (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username (nama di database ini)
        $user = User::where('name', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    })->name('login.process');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Proses Logout
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        $totalAset = Aset::count();
        $kondisiBaik = Aset::where('kondisi', 'baik')->count();
        $kondisiRusakRingan = Aset::where('kondisi', 'rusak ringan')->count();
        $kondisiRusakBerat = Aset::where('kondisi', 'rusak berat')->count();
        $totalRusak = $kondisiRusakRingan + $kondisiRusakBerat;

        $pctAktif = $totalAset > 0 ? round(($kondisiBaik / $totalAset) * 100, 2) : 0;
        $pctRusak = $totalAset > 0 ? round(($totalRusak / $totalAset) * 100, 2) : 0;

        return view('dashboard.index', compact(
            'totalAset', 'kondisiBaik', 'totalRusak', 'pctAktif', 'pctRusak'
        ));
    })->name('dashboard');

    // Monitoring
    Route::get('/monitoring', function () {
        $asets = Aset::with('satker')->get();

        return view('dashboard.monitoring', compact('asets'));
    })->name('monitoring');

    // Visualisasi
    Route::get('/visualisasi', function () {
        $totalAset = Aset::count();
        $kondisiBaik = Aset::where('kondisi', 'baik')->count();
        $kondisiRusakRingan = Aset::where('kondisi', 'rusak ringan')->count();
        $kondisiRusakBerat = Aset::where('kondisi', 'rusak berat')->count();
        $totalRusak = $kondisiRusakRingan + $kondisiRusakBerat;

        $pctAktif = $totalAset > 0 ? round(($kondisiBaik / $totalAset) * 100, 1) : 0;
        $pctRusak = $totalAset > 0 ? round(($totalRusak / $totalAset) * 100, 1) : 0;

        $pctBaik = $totalAset > 0 ? round(($kondisiBaik / $totalAset) * 100, 1) : 0;
        $pctRusakChart = $totalAset > 0 ? round(($totalRusak / $totalAset) * 100, 1) : 0;
        $pctPerbaikan = $totalAset > 0 ? round(($kondisiRusakRingan / $totalAset) * 100, 1) : 0;
        $pctRusakBeratChart = $totalAset > 0 ? round(($kondisiRusakBerat / $totalAset) * 100, 1) : 0;

        $asetTerbaru = Aset::with('satker')->orderBy('id', 'desc')->limit(6)->get();
        $asetRusak = Aset::with('satker')->whereIn('kondisi', ['rusak ringan', 'rusak berat'])->get();

        return view('dashboard.visualisasi', compact(
            'totalAset', 'kondisiBaik', 'totalRusak',
            'kondisiRusakRingan', 'kondisiRusakBerat',
            'pctAktif', 'pctRusak',
            'pctBaik', 'pctRusakChart', 'pctPerbaikan', 'pctRusakBeratChart',
            'asetTerbaru', 'asetRusak'
        ));
    })->name('visualisasi');

    // Filtering
    Route::get('/filtering', function (Request $request) {
        $kategoris = Aset::select('kategori')->distinct()->pluck('kategori');
        $kondisis = ['baik', 'rusak ringan', 'rusak berat'];
        $satkers = Satker::all();

        $query = Aset::with('satker');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }
        if ($request->filled('lokasi')) {
            $query->whereHas('satker', function ($q) use ($request) {
                $q->where('alamat', 'like', '%' . $request->lokasi . '%');
            });
        }
        if ($request->filled('tahun')) {
            $query->where('tahun_perolehan', $request->tahun);
        }
        if ($request->filled('nilai_min')) {
            $query->where('nilai_perolehan', '>=', $request->nilai_min);
        }
        if ($request->filled('nilai_max')) {
            $query->where('nilai_perolehan', '<=', $request->nilai_max);
        }

        $hasFilter = $request->hasAny(['kategori', 'kondisi', 'lokasi', 'tahun', 'nilai_min', 'nilai_max']);
        $results = $hasFilter ? $query->get() : collect();

        return view('dashboard.filtering', compact(
            'kategoris', 'kondisis', 'satkers', 'results', 'hasFilter'
        ));
    })->name('filtering');

    // Total Aset
    Route::get('/total-aset', function () {
        $asets = \App\Models\Aset::select('nama_aset', 'kategori', 'kondisi', \Illuminate\Support\Facades\DB::raw('count(*) as jumlah'))
            ->groupBy('nama_aset', 'kategori', 'kondisi')
            ->paginate(5);
        return view('dashboard.total-aset', compact('asets'));
    })->name('total-aset');

    // Laporan Aset
    Route::get('/laporan-aset', function () {
        $asets = Aset::with('satker')->orderBy('id', 'desc')->get();
        return view('dashboard.laporan-aset', compact('asets'));
    })->name('laporan-aset');

    Route::post('/laporan-aset', function (Request $request) {
        $request->validate([
            'nama_aset' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'nilai_perolehan' => 'required|numeric',
            'tahun_perolehan' => 'required|integer',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat',
            'satker_id' => 'required|exists:satker,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only([
            'nama_aset', 'kategori', 'nilai_perolehan',
            'tahun_perolehan', 'kondisi', 'satker_id'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('assets', $filename, 'public');
            $data['gambar'] = $filename;
        }

        Aset::create($data);

        return redirect()->route('laporan-aset')->with('success', 'Aset berhasil ditambahkan');
    })->name('laporan-aset.store');

    // Manajemen Pengguna
    Route::get('/manajemen-pengguna', function () {
        $users = User::all();
        return view('dashboard.manajemen-pengguna', compact('users'));
    })->name('manajemen-pengguna');

    Route::post('/manajemen-pengguna', function (Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'nullable|string|min:6',
            'name' => 'nullable|string|max:100',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($request->filled('password')) {
            $user->password = $request->password;
        }
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        $user->save();

        return redirect()->route('manajemen-pengguna')->with('success', 'Data pengguna berhasil diubah');
    })->name('manajemen-pengguna.update');

    // Edit Profil
    Route::get('/profil', function () {
        return view('dashboard.profil');
    })->name('profil');

    Route::post('/profil', function (Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'nullable|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && file_exists(storage_path('app/public/profiles/' . $user->photo))) {
                unlink(storage_path('app/public/profiles/' . $user->photo));
            }
            
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profiles', $filename, 'public');
            $user->photo = $filename;
        }

        $user->save();

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    })->name('profil.update');

    // FAQ
    Route::get('/faq', function () {
        return view('dashboard.faq');
    })->name('faq');

});

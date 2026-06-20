<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Satker;

class DashboardController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
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
    }

    public function monitoring()
    {
        $asets = Aset::with('satker')->get();
        return view('dashboard.monitoring', compact('asets'));
    }

    public function visualisasi()
    {
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
    }

    public function filtering(Request $request)
    {
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
    }
    
    public function faq()
    {
        return view('dashboard.faq');
    }
}

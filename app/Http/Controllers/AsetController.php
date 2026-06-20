<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use Illuminate\Support\Facades\DB;

class AsetController extends Controller
{
    public function totalAset()
    {
        $asets = Aset::select('nama_aset', 'kategori', 'kondisi', DB::raw('count(*) as jumlah'))
            ->groupBy('nama_aset', 'kategori', 'kondisi')
            ->paginate(5);
        return view('dashboard.total-aset', compact('asets'));
    }

    public function laporanAset()
    {
        $asets = Aset::with('satker')->orderBy('id', 'desc')->get();
        return view('dashboard.laporan-aset', compact('asets'));
    }

    public function storeLaporanAset(Request $request)
    {
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
    }
}

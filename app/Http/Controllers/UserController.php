<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function manajemenPengguna()
    {
        $users = User::all();
        return view('dashboard.manajemen-pengguna', compact('users'));
    }

    public function updatePengguna(Request $request)
    {
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
    }

    public function profil()
    {
        return view('dashboard.profil');
    }

    public function updateProfil(Request $request)
    {
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
    }
}

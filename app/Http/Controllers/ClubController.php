<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::latest()->paginate(10);

        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:clubs',
            'kota' => 'required',
            'negara' => 'required',
            'tahun_berdiri' => 'required|digits:4|numeric',
            'stadion' => 'required',
            'pelatih' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama.required' => 'Nama klub harus diisi.',
            'nama.unique' => 'Nama klub sudah digunakan.',
            'tahun_berdiri.required' => 'Tahun berdiri harus diisi.',
            'tahun_berdiri.digits' => 'Tahun berdiri harus berupa angka dengan panjang 4 digit.',
            'tahun_berdiri.numeric' => 'Tahun berdiri harus berupa angka.',
            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Format file logo harus jpeg, png, jpg, atau gif.',
            'logo.max' => 'Ukuran file logo tidak boleh lebih dari 2MB.',
        ]);

        // Proses menyimpan file logo ke storage
        if ($request->hasFile('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('logos', $fileName, 'public');
        } else {
            $fileName = null;
        }

        // Simpan data klub beserta nama file logo ke dalam database
        Club::create([
            'nama' => $request->nama,
            'kota' => $request->kota,
            'negara' => $request->negara,
            'tahun_berdiri' => $request->tahun_berdiri,
            'stadion' => $request->stadion,
            'pelatih' => $request->pelatih,
            'logo' => $fileName, // Simpan nama file logo ke dalam kolom logo
        ]);

        return redirect()->route('clubs.index')->with('success', 'Klub berhasil ditambahkan.');
    }

    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'negara' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer',
            'stadion' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        $club = Club::findOrFail($id);

        // Update data klub
        $club->nama = $request->nama;
        $club->kota = $request->kota;
        $club->negara = $request->negara;
        $club->tahun_berdiri = $request->tahun_berdiri;
        $club->stadion = $request->stadion;
        $club->pelatih = $request->pelatih;

        // Proses file gambar jika diunggah
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->storeAs('public/logos', $logoName);
            $club->logo = $logoName;

            // Hapus file gambar lama jika ada
            if ($request->current_logo && Storage::exists('public/logos/' . $request->current_logo)) {
                Storage::delete('public/logos/' . $request->current_logo);
            }
        } else {
            // Jika tidak ada file baru diunggah, tetap gunakan logo lama
            $club->logo = $request->current_logo;
        }

        // Simpan perubahan
        $club->save();

        return redirect()->route('clubs.index')->with('success', 'Klub berhasil diperbarui.');
    }

    public function destroy(Club $club)
    {
        // Hapus file logo dari storage jika ada sebelum menghapus data klub
        if ($club->logo && Storage::disk('public')->exists('logos/' . $club->logo)) {
            Storage::disk('public')->delete('logos/' . $club->logo);
        }

        $club->delete();

        return redirect()->route('clubs.index')->with('success', 'Klub berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Tampilkan daftar semua galeri.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Tampilkan form tambah galeri baru.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Simpan galeri baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only('title', 'description');

        // Upload gambar (wajib untuk galeri)
        $data['image'] = $request->file('image')->store('galleries', 'public');

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gambar galeri berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit galeri.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update galeri di database.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->only('title', 'description');

        // Upload gambar baru jika ada, hapus yang lama
        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gambar galeri berhasil diperbarui.');
    }

    /**
     * Hapus galeri dari database.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus file gambar
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gambar galeri berhasil dihapus.');
    }
}

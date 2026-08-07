<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function index(): View
    {
        $links = Link::latest()->paginate(5);
        return view('admin.links.index', compact('links'));
    }

    public function create(): View
    {
        return view('admin.links.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Handling Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // 3. Simpan ke Database via Eloquent
        Link::create([
            'title'     => $validated['title'],
            'url'       => $validated['url'],
            'image'     => $imagePath,
            'is_active' => $request->boolean('is_active'),
            'clicks'    => 0,
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan baru berhasil ditambahkan!');
    }

	public function edit(Link $link): View
	{
		return view('admin.links.edit', compact('link'));
	}

	public function update(Request $request, Link $link): RedirectResponse
    {
        // 1. Validasi Input Data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Default: Gunakan path gambar lama yang sudah ada di DB
        $imagePath = $link->image;

        // 2. Logika Replacement Berkas
        if ($request->hasFile('image')) {
            // Hapus gambar fisik lama dari disk 'public' jika ada
            if ($link->image) {
                Storage::disk('public')->delete($link->image);
            }

            // Simpan gambar baru ke direktori 'links'
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // 3. Evaluasi Checkbox & Update Record Database
        $link->update([
            'title'     => $validated['title'],
            'url'       => $validated['url'],
            'image'     => $imagePath,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil diperbarui!');
    }

	    /**
     * Menghapus record tautan dari database dan memusnahkan berkas gambarnya.
     */
    public function destroy(Link $link): RedirectResponse
    {
        // 1. Eksekusi pembersihan berkas fisik di storage server
        if ($link->image) {
            Storage::disk('public')->delete($link->image);
        }

        // 2. Hapus record dari tabel database
        $link->delete();

        // 3. Kembalikan ke halaman indeks dengan flash notification
        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan beserta berkas gambarnya berhasil dihapus secara permanen!');
    }
}
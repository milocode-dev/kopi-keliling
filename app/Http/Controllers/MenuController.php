<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::with('kategori');

        // Filter berdasarkan kategori
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Filter berdasarkan pencarian nama menu
        if ($request->filled('search')) {
            $query->where('nama_menu', 'like', '%' . $request->search . '%');
        }

        // Ambil data dengan pagination (6 item per halaman)
        $menus = $query->latest()->paginate(6);
        $kategoris = Kategori::all();

        return view('menu.index', compact('menus', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('menu.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $kategoris = Kategori::all();
        return view('menu.edit', compact('menu', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
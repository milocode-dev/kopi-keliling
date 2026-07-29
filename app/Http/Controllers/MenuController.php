<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('kategori')->latest()->get();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('menu.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'kategori_id' => 'required|exists:kategoris,id',
        'nama_menu' => 'required|string|max:255',
        'harga' => 'required|integer|min:0',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('menu', 'public');
    }

    Menu::create([
        'kategori_id' => $request->kategori_id,
        'nama_menu' => $request->nama_menu,
        'harga' => $request->harga,
        'gambar' => $path,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        $kategories = Kategori::all(); // Untuk dropdown pilihan kategori
        
        return view('menu.edit', compact('menu', 'kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_menu'   => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Boleh kosong jika tidak ganti gambar
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'nama_menu'   => $request->nama_menu,
            'harga'       => $request->harga,
        ];

        // Jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // 1. Hapus gambar lama jika ada di storage
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }

            // 2. Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->delete();

        return redirect()->route('menu.index')->with('Succes', 'Menu berhasil dihapus');
    }
}

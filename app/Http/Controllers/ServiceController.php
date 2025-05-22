<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('service.index', compact('services'));
    }
    public function create() {
        return view('service.create');
    }
    public function store(Request $request) {
        $request->validate([
            'type_layanaan' => 'required',
            'nama_layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar_layanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'type_layanaan.required' => 'Type Layanan harus diisi',
            'nama_layanan.required' => 'Nama Layanan harus diisi',
            'harga.required' => 'Harga harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'gambar_layanan.required' => 'Gambar Layanan harus diisi',
        ]);

        $gambarPath = $request->file('gambar_layanan')->store('gambar_layanan', 'public');

        Service::create([
            'type_layanaan' => $request->type_layanaan,
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_layanan' => $gambarPath,
        ]);

        return redirect()->route('service.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id) {
        $service = Service::find($id);
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, Service $service) {
        $request->validate([
            'type_layanaan' => 'required',
            'nama_layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'type_layanaan.required' => 'Type Layanan harus diisi',
            'nama_layanan.required' => 'Nama Layanan harus diisi',
            'harga.required' => 'Harga harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'gambar_layanan.nullable' => 'Gambar Layanan harus diisi',
        ]);

        $service = Service::findOrFail($service->id);

        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('gambar_layanan')) {
            if ($service->gambar_layanan && Storage::disk('public')->exists($service->gambar_layanan)) {
                Storage::disk('public')->delete($service->gambar_layanan);
            }
            $gambarPath = $request->file('gambar_layanan')->store('gambar_layanan', 'public');
        } else {
            $gambarPath = $service->gambar_layanan;
        }

        $service->update([
            'type_layanaan' => $request->type_layanaan,
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_layanan' => $gambarPath,
        ]);
        return redirect()->route('service.index')->with('success', 'Layanan berhasil diubah');
    }

    public function destroy(Service $service) {
        $service = Service::findOrFail($service->id);
       $service->delete();
        return redirect()->route('service.index')->with('success', 'Layanan berhasil dihapus');
    }
}

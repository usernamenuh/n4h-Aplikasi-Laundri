<?php

namespace App\Http\Controllers;
use App\Models\laundri;
use Database\Seeders\LaundriSeeder;
use Illuminate\Http\Request;
use App\Models\transaksi;

class LaundriController extends Controller
{
    public function index()
    {
        $laundris = laundri::with('transaksi')->get();
        return view('laundri.index', compact('laundris',));
    }

    public function create()
    {
        return view('laundri.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|in:self_service,full_service',
        ], [
            'name.required' => 'Nama laundri harus diisi.',
            'address.required' => 'Alamat laundri harus diisi.',
            'phone.required' => 'Nomor telepon laundri harus diisi.',
            'email.required' => 'Email laundri harus diisi.',
            'type.required' => 'Tipe laundri harus dipilih.',
        ]);
        laundri::create($request->all());
        return redirect()->route('laundri.index')->with('success', 'Laundri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laundri = laundri::findOrFail($id);
        return view('laundri.edit', compact('laundri'));
    }
    public function update(Request $request, Laundri $laundri)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|in:self_service,full_service',
        ], [
            'name.required' => 'Nama laundri harus diisi.',
            'address.required' => 'Alamat laundri harus diisi.',
            'phone.required' => 'Nomor telepon laundri harus diisi.',
            'email.required' => 'Email laundri harus diisi.',
            'type.required' => 'Tipe laundri harus dipilih.',
        ]);
        $laundri->update($request->all());
        return redirect()->route('laundri.index')->with('success', 'Laundri berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Laundri::destroy($id);
        return redirect()->route('laundri.index')->with('success', 'Laundri berhasil dihapus.');
    }
}

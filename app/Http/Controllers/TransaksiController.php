<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laundri;
use App\Models\transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = transaksi::all();
        $laundris = laundri::all();
        return view('transaksi.index', compact('transaksis'));
    }
    public function create()
    {
        $laundris = laundri::all();
        return view('transaksi.create', compact('laundris'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'laundri_id' => 'required|exists:laundris,id',
            'payment_method' => 'required|in:cash,credit_card,debit_card',
            'status' => 'required|in:pending,completed,canceled'
        ], [
            'laundri_id.required' => 'Nama harus dipilih.',
            'payment_method.required' => 'Metode pembayaran harus dipilih.',
            'status.required' => 'Status harus dipilih.',
        ]);
        transaksi::create($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $laundris = laundri::all();
        return view('transaksi.edit', compact('transaksi', 'laundris'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = transaksi::findOrFail($id);
        $request->validate([
            'laundri_id' => 'required|exists:laundris,id',
            'payment_method' => 'required|in:cash,credit_card,debit_card',
            'status' => 'required|in:pending,completed,canceled'
        ], [
            'laundri_id.required' => 'Nama harus dipilih.',
            'payment_method.required' => 'Metode pembayaran harus dipilih.',
            'status.required' => 'Status harus dipilih.',
        ]);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with(['message' => 'Data transaksi berhasil dihapus.',
    'type' => 'danger']);
    }

}

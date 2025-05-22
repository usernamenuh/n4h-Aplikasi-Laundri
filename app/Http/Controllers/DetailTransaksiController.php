<?php

namespace App\Http\Controllers;
use App\Models\detail_transaksi;
use App\Models\transaksi;
use App\Models\service;
use App\Models\laundri;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksis = detail_transaksi::all();
        $transaksis = transaksi::all();
        $services = service::all();
        $laundris = laundri::all();
        return view('detail_transaksi.index', compact('detailTransaksis', 'transaksis', 'services'));
    }
    public function create()
    {
        $transaksis = transaksi::all();
        $services = service::all();
        $laundris = laundri::all();
        return view('detail_transaksi.create', compact('transaksis', 'services', 'laundris'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'service_id' => 'required|exists:services,id',
            'laundri_id' => 'required|exists:laundris,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|integer',
        ], [
            'transaksi_id.required' => 'Transaksi harus dipilih.',
            'service_id.required' => 'Layanan harus dipilih.',
            'laundri_id.required' => 'Pelanggan harus dipilih.',
            'quantity.required' => 'Quantity harus diisi.',
            'subtotal.required' => 'Subtotal harus diisi.',
        ]);
        detail_transaksi::create($request->all());
        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $detailTransaksi = detail_transaksi::find($id);
        $transaksis = transaksi::all();
        $services = service::all();
        $laundris = laundri::all();
        return view('detail_transaksi.edit', compact('detailTransaksi', 'transaksis', 'services', 'laundris'));
    }
    public function update(Request $request, detail_transaksi $detailTransaksi)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'service_id' => 'required|exists:services,id',
            'laundri_id' => 'required|exists:laundris,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|integer',
        ], [
            'transaksi_id.required' => 'Transaksi harus dipilih.',
            'service_id.required' => 'Layanan harus dipilih.',
            'laundri_id.required' => 'Pelanggan harus dipilih.',
            'quantity.required' => 'Quantity harus diisi.',
            'subtotal.required' => 'Subtotal harus diisi.',
        ]);
        $detailTransaksi->update($request->all());
        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil diubah.');
    }
    public function destroy(detail_transaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil dihapus.');
    }
}

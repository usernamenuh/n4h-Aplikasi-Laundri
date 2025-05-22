@extends('layouts.mantis')

@section('title', 'Data Detail Transaksi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Data Transaksi</a></li>
    <li class="breadcrumb-item" aria-current="page">Detail Transaksi</li>
@endsection

@section('content')

<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Data Detail Transaksi</h4>
            <div class="">
                <a href="{{ route('detail_transaksi.create') }}" class="btn btn-primary">Tambah Detail Transaksi</a>
            </div>
        </div>
        <div class="card-body my-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Nama Layanan</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailTransaksis as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->laundri->name }}</td>
                        <td>{{ $item->transaksi->payment_method }}</td>
                        <td>{{ $item->transaksi->status }}</td>
                        <td>{{ $item->service->nama_layanan }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>
                            <div>
                            <form action="{{ route('detail_transaksi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                <a href="{{ route('detail_transaksi.edit', $item->id) }}">
                                <button type="button" class="btn btn-outline-primary">Edit</button>
                            </a>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@extends('layouts.mantis')

@section('title', 'Data Transaksi')

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">Data Transaksi</li>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Data Transaksi</h4>
            <div class="">
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->laundri->name }}</td>
                        <td>{{ $item->payment_method }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div>
                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                <a href="{{ route('transaksi.edit', $item->id) }}">
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
@endsection


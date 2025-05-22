
@extends('layouts.mantis')
@section('content')

<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Tambah Detail Transaksi</h4>
            <a href="{{ route('detail_transaksi.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('detail_transaksi.store') }}" method="POST" class="">
                @csrf
                <div class="mb-3">
                    <label for="laundri_id" class="form-label">Nama Pelanggan</label>
                    <select name="laundri_id" id="laundri_id" class="form-select @error('laundri_id') is-invalid @enderror">
                        <option value="">Pilih Pelanggan</option>
                        @foreach ($laundris as $laundri)
                            <option value="{{ $laundri->id }}">{{ $laundri->name }}</option>
                        @endforeach
                    </select>
                    @error('laundri_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="transaksi_id" class="form-label">Transaksi</label>
                    <select name="transaksi_id" id="transaksi_id" class="form-select @error('transaksi_id') is-invalid @enderror">
                        <option value="">Pilih Transaksi</option>
                        @foreach ($transaksis as $transaksi)
                            <option value="{{ $transaksi->id }}">{{ $transaksi->payment_method }}</option>
                        @endforeach
                    </select>
                    @error('transaksi_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="">Pilih Status</option>
                        @foreach ($transaksis as $transaksi)
                            <option value="{{ $transaksi->id }}">{{ $transaksi->status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="service_id" class="form-label">Layanan</label>
                    <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror">
                        <option value="">Pilih Layanan</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->type_layanaan }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror">
                    @error('quantity')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="subtotal" class="form-label">Subtotal</label>
                    <input type="number" name="subtotal" id="subtotal" class="form-control @error('subtotal') is-invalid @enderror">
                    @error('subtotal')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

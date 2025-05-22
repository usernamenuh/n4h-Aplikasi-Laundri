
@extends('layouts.mantis')

@section('content')

<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Edit Transaksi</h4>
            <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="laundri_id" class="form-label">Nama Pelanggan</label>
                    <select name="laundri_id" id="laundri_id" class="form-select @error('laundri_id') is-invalid @enderror">
                        <option value="">Pilih Pelanggan</option>
                        @foreach ($laundris as $laundri)
                            <option value="{{ $laundri->id }}" {{ $transaksi->laundri_id == $laundri->id ? 'selected' : '' }} >{{ $laundri->name }}</option>
                        @endforeach
                    </select>
                    @error('laundri_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-select @error('payment_method') is-invalid @enderror">
                        <option value="">Pilih Metode Pembayaran</option>
                        <option value="cash" {{ $transaksi->payment_method  == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="credit_card" {{ $transaksi->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="debit_card" {{ $transaksi->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                    </select>
                    @error('payment_method')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="">Pilih Status</option>
                        <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $transaksi->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ $transaksi->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection

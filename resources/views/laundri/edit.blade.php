@extends('layouts.mantis')

@section('content')
<div class="">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Tambah Data Laundri</h4>
            <div>
                <a href="{{ route('laundri.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('laundri.update', $laundri->id) }}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name')
                    is-invalid @enderror" value="{{ $laundri->name }}" id="name" name="name" autofocus>
                    @error('name')
                    <small class="text-danger">
                            {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address')
                    is-invalid @enderror" value="{{ $laundri->address }}" id="address" name="address">
                    @error('address')
                    <small class="text-danger">
                            {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone')
                    is-invalid @enderror" value="{{ $laundri->phone }}" id="phone" name="phone">
                    @error('phone')
                    <small class="text-danger">
                            {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email')
                    is-invalid @enderror" id="email" name="email" value="{{ $laundri->email }}">
                    @error('email')
                    <small class="text-danger">
                            {{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="self_service" {{ $laundri->type == 'self_service' ? 'selected' : '' }}>Self Service</option>
                        <option value="full_service" {{ $laundri->type == 'full_service' ? 'selected' : '' }}>Full Service</option>
                    </select>
                </div>
                <div class="my-2 d-flex justify-content-end">
                <button class="btn btn-primary mt-3">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

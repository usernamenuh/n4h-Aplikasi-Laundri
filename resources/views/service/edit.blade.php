
@extends('layouts.mantis')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Tambah Layanan</h3>
            <a href="{{ route('service.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="type_layanaan">Type Layanan</label>
                    <select name="type_layanaan" id="type_layanaan" class="form-control @error('type_layanaan') is-invalid @enderror">
                        <option value="">Pilih Type Layanan</option>
                        <option value="Layanan_Cuci_dan_Setrika" {{ $service->type_layanaan == 'Layanan_Cuci_dan_Setrika' ? 'selected' : ''}}>Layanan Cuci dan Setrika</option>
                        <option value="Layanan_Pakaian_Khusus" {{ $service->type_layanaan == 'Layanan_Pakaian_Khusus' ? 'selected' : ''}}>Layanan Pakaian Khusus</option>
                        <option value="Layanan_Rumah_Tangga" {{ $service->type_layanaan == 'Layanan_Rumah_Tangga' ? 'selected' : ''}}>Layanan Cuci Kering</option>
                        <option value="Layanan_Tambahan" {{ $service->type_layanaan == 'Layanan_Tambahan' ? 'selected' : '' }}>Layanan Cuci Kering</option>
                        <option value="Layanan_Antar_Jemput" {{ $service->type_layanaan == 'Layanan_Antar_Jemput' ? 'selected' : ''}}>Layanan Paket</option>
                        @error('type_layanan')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_layanan">Nama Layanan</label>
                    <input type="text" name="nama_layanan" id="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" value="{{ $service->nama_layanan }}">
                    @error('nama_layanan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $service->harga }}">
                    @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ $service->deskripsi }}</textarea>
                    @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    @if($service->gambar_layanan)
        <div class="mb-3">
            <label>Gambar Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $service->gambar_layanan) }}" alt="Gambar Layanan" width="150" height="150">
        </div>
    @endif
                    <label for="gambar_layanan">Gambar Layanan</label>
                    <input type="file" name="gambar_layanan" id="gambar_layanan" class="form-control @error('gambar_layanan') is-invalid @enderror" value="{{ $service->gambar_layanan }}">
                    @error('gambar_layanan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection

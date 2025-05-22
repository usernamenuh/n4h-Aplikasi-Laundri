@extends('layouts.mantis')

@section('title', 'Daftar Layanan')

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">Daftar Layanan</li>
@endsection

@section('content')

<div class="container">
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Layanan</h3>
        <a href="{{ route('service.create') }}" class="btn btn-primary">Tambah Layanan</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Type Layanan</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service => $key)
                    <tr>
                        <td>{{ $service + 1 }}</td>
                        <td>{{ $key->type_layanaan }}</td>
                        <td>{{ $key->nama_layanan }}</td>
                        <td>Rp. {{ number_format($key->harga, 0, ',', '.') }}</td>
                        <td>{{ $key->deskripsi }}</td>
                        <td>
                            @if ($key->gambar_layanan)
                                <img src="{{ asset('storage/' . $key->gambar_layanan) }}" alt="Gambar Layanan" class="img-fluid" style="width: 100px; height: 100px;">
                            @else
                              <span>Gambar Belum Tersedia</span>
                            @endif
                        </td>
                        <td>
                        <div>
                            <form action="{{ route('service.destroy', $key->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus service ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                <a href="{{ route('service.edit', $key->id) }}">
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


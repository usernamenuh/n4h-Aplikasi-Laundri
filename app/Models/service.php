<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class service extends Model
{
    protected $table = 'services';
    protected $fillable = ['type_layanaan', 'nama_layanan', 'harga', 'deskripsi', 'gambar_layanan'];


    protected static function booted()
    {
        static::deleting(function ($service) {
            if ($service->gambar_layanan && Storage::disk('public')->exists($service->gambar_layanan)) {
                Storage::disk('public')->delete($service->gambar_layanan);
            }
        });
    }
}
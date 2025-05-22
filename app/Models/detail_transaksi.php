<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
    public function service()
    {
        return $this->belongsTo(service::class);
    }
    public function laundri()
    {
        return $this->belongsTo(laundri::class);
    }
    protected $table = 'detail_transaksis';
    protected $fillable = [
        'laundri_id',
        'transaksi_id',
        'service_id',
        'quantity',
        'subtotal'
    ];

}

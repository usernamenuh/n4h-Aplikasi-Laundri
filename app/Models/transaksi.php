<?php

namespace App\Models;
use App\Models\laundri;


use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    public function laundri()
    {
        return $this->belongsTo(laundri::class);
    }
    public function detail_transaksi()
    {
        return $this->hasOne(detail_transaksi::class);
    }

    protected $table = 'transaksis';
    protected $fillable = [
        'laundri_id',
        'payment_method',
        'status'
    ];
}

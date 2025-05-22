<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laundri extends Model
{
    public function transaksi()
    {
        return $this->hasOne(transaksi::class);
    }
    protected $table = 'laundris';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'type',
    ];
}

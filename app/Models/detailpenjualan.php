<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpenjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'kuantitas',
    ];
}

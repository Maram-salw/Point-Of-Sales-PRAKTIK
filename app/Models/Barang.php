<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang', 'nama_merk', 'nama_distributor', 'harga_barang', 'harga_beli', 'stok', 'tgl_masuk', 'nama_petugas'
        ];
    
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'nama_merk');
    }
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'nama_distributor');
    }
    
}

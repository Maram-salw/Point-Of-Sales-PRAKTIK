<?php

namespace App\Models;

use App\Models\Rombel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis', 'nama', 'rombel', 'rayon'
        ];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'nama_rombel');
    }
        
}

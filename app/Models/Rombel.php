<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
    protected $fillable = [
         'nama_rombel'
        ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'rombel');
    }
        
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'telepon',
        'email',
        'universitas',
        'lokasi',
        'mulai',
        'selesai',
        'keterangan',
        'berkas_ktp',
        'berkas_ktm',
        'berkas_permohonan',
        'berkas_proposal',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function stat()
    {
        return $this->belongsTo(Stat::class, 'stat_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skp_realisasi extends Model
{
    use HasFactory;
    
    protected $table = 'pegawai';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_skp_target',
        'lokasi',
        'jml_realisasi',
        'keterangan',
        'path_bukti',
        'inserted_by',
        'edited_by',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'inserted_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'edited_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'tanggal_awal' => 'date',
        'tanggal_akhir' => 'date',
    ];
}

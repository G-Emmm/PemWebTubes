<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skp_realisasi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lokasi',
        'jml_realisasi',
        'keterangan',
        'path_bukti',
        'inserted_by',
        'edited_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'inserted_at' => 'timestamp',
        'edited_at' => 'timestamp',
        'tanggal_awal' => 'date',
        'tanggal_akhir' => 'date',
    ];
}

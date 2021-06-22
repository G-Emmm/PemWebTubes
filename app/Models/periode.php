<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    use HasFactory;

    protected $table = 'periode';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
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

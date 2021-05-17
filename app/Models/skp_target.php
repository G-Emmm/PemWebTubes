<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skp_target extends Model
{
    use HasFactory;

    protected $table = 'skp_target';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id_pegawai',
        'id_periode',
        'id_jabatan',
        'inserted_by',
        'edited_by',
        'id_uraian_pekerjaan',
        'id_uraian_pekerjaan_jabatan',
        'jml_target',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'inserted_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'edited_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
    ];
}

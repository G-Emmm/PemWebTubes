<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
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
        'kode_pegawai',
        'nama',
        'alamat',
        'inserted_by',
        'edited_by',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'inserted_at' => 'timestamp',
        'edited_at' => 'timestamp',
    ];
}

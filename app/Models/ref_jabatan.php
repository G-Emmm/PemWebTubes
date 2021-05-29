<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_jabatan extends Model
{
    use HasFactory;

    protected $table = 'ref_jabatan';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';

    protected $attributes = [
        'is_active' => 1
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'keterangan',
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
        'inserted_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'edited_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
    ];
}
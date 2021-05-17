<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uraian_pekerjaan extends Model
{
    use HasFactory;
    
    protected $table = 'uraian_pekerjaan';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uraian',
        'keterangan',
        'poin',
        'satuan',
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
        'is_active' => 'boolean',
        'inserted_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
        'edited_at' => 'datetime:Y-m-d\TH:i:s.u\Z',
    ];
}

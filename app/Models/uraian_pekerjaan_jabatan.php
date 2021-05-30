<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class uraian_pekerjaan_jabatan extends BaseModel
{
    use HasFactory;

    protected $table = 'uraian_pekerjaan_jabatan';
    protected $primaryKey = ['id_jabatan', 'id_uraian_pekerjaan'];
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
        'id_jabatan',
        'id_uraian_pekerjaan',
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

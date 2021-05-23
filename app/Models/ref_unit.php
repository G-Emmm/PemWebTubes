<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref_unit extends Model
{
    use HasFactory;

    protected $table = 'ref_unit';
    const CREATED_AT = 'inserted_at';
    const UPDATED_AT = 'edited_at';
    public $timestamps = false;

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
        'level',
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
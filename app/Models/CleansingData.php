<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;
class CleansingData extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'id_umkm',
        'id_rules',
        'source',
        'yearly_turnover',
        'business_age',
        'total_manpower',
        'status'
    ];
}

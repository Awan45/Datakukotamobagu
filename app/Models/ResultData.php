<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;
class ResultData extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'id_umkm',
        'td_name',
        'yearly_turnover',
        'business_age',
        'total_manpower',
        'id_rules',
        'status',
        'is_include'
    ];
}

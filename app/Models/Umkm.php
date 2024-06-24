<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;

class Umkm extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'umkm_name',
        'owner_nik',
        'district',
        'subdistrict',
        'address',
        'rt_rw',
        'phone',
        'business_field',
        'legal_document',
        'asset',
        'monthly_turnover',
        'yearly_turnover',
        'date_establish',
        'total_manpower',
        'business_category',
        'subsidies_type',
        'status'
    ];
}

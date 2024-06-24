<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;

class Koperasi extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'k_name',
        'legal_entity_date',
        'legal_entity_number',
        'district',
        'subdistrict',
        'address',
        'certificate_status',
        'k_type',
        'owner_nik',
        'status'
    ];
}

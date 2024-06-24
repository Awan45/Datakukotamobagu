<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;
class TrainingData extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'id_umkm',
        'td_name',
        'year_turnover',
        'business',
        'total_manpower',
        'status',
        'is_include'
    ];
}

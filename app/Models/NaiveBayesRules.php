<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\UUID;
class NaiveBayesRules extends Model
{
    use HasFactory, UUID, SoftDeletes;
    public $timestamps = true;
    public $fillable = [
        'rules_name',
        'turnover_opt',
        'business_age_opt',
        'total_manpower_opt',
        'turnover_value',
        'business_age_value',
        'total_manpower_value',
    ];
}

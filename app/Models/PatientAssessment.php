<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition_type',
        'first_name',
        'last_name',
        'age',
        'height',
        'weight',
        'bmi',
        'daily_activity',
        'gender',
        'date_of_birth',
        'date_of_admission'
    ];
}

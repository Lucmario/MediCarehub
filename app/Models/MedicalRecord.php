<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'description', 'treatment', 'record_date'
    ];

    protected $casts = [
        'record_date' => 'date'
    ];

    public static function rules()
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'treatment' => 'nullable|string',
            'record_date' => 'nullable|date'
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

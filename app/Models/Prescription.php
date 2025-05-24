<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id', 'description', 'medicaments'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id', 'montant', 'statut_paiement', 'methode_paiement', 'caissier_id'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class, 'caissier_id');
    }
}

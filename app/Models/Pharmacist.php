<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nom_pharmacie'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

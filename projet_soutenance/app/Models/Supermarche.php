<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes;


class Supermarche extends Model
{

    use HasFactory;

    protected $fillable = [
        'nom',
        'adress',
        'email',
        // Autres champs nécessaires
    ];

    public function commandes()
    {
        return $this->hasMany(Commandes::class);
    }
}

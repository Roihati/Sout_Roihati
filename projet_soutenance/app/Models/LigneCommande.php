<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes;

use App\Models\Products;
class LigneCommande extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
    ];

    public function commandes()
    {
        return $this->belongsTo(Commandes::class);
    }

    public function produit()
    {
        return $this->belongsTo(Products::class);
    }



}

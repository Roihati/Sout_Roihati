<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_supermarche',
        'produit_id',
        'quantite',
        'date_livraison',
        'status',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'produit_id'); // Utilisez Product ici
        
    }

    public function supermarche()
    {
        return $this->belongsTo(Supermarche::class, 'id_supermarche');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supermarche;
use App\Models\Products;


class Commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_supermarche',
        'product_id',
        'quantite',
        'date_livraison',
        'status',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id'); // Utilisez Product ici
        
    }

    public function supermarches()
    {
        return $this->belongsTo(Supermarche::class ,'id_supermarche');

    }
    public function lignes()
{
    return $this->hasMany(LigneCommande::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'produit_id',
        'date_livraison',
        'quantite',
        
    ];

}

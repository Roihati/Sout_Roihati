<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commandes ;
use App\Models\Categories ;

class Products extends Model
{
    use HasFactory;


    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'role_id',
        #'titre',
        'description',
        'category',
        'image',
        'price',
        'stock',
        'quantite_disponible', 
        'seuil_reapprovisionnement', 'status',

         'category_id'
    ];
// Vérifie si le produit est en dessous du seuil de réapprovisionnement
public function besoinReapprovisionnement()
{
    return $this->quantite_disponible <= $this->seuil_reapprovisionnement;
}
     // Méthode pour vérifier si le produit doit être réapprovisionné
     public function checkStock()
     {
         if ($this->quantite_disponible <= $this->seuil_reapprovisionnement) {
             $this->status = 'rupture';
             $this->save();
             return true; // Alarme de réapprovisionnement
         }
         return false;
     }
 
     // Méthode pour mettre à jour la quantité
     public function updateStock(int $quantite)
     {
         $this->quantite_disponible += $quantite;
         $this->checkStock(); // Vérifier après chaque modification de stock
         $this->save();
     }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commandes::class);
    }


    public function lignes()
    {
        return $this->belongsToMany(User::class, 'ligne_commandes');
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

}


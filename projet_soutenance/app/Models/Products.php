<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

}

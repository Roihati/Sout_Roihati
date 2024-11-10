<?php
// app/Models/Category.php
namespace App\Models;
use App\models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['libele', 'icon'];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

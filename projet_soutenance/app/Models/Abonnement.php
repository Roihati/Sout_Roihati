<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['nom_fournisseur', 'prix', 'durée' ,'status'];
}

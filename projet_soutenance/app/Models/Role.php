<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use CrudTrait;
    use HasFactory;
    
    protected $fillable = [
        
        'name',
        'guard_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}

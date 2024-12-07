<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;





class User extends Authenticatable
{

    use HasRoles;
    use CrudTrait;
    use HasRoles;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password',
        'role_id'
    ];

  
       
    
        public function roles() {
            return $this->belongsToMany(Role::class);
        }
    
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    /* $user = User::find(1);
    $user->assignRole('client');*/

    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Products::class, 'favorites');
    }


    // app/Models/User.php

public function getRedirectRoute()
{
    return match ($this->role_id) {
        1 => route('client.Home'),
        2 => route('fournisseur.accueil'),
        3 => route('suppermarche.dashboard'),
        4 => route('backpack::base.dashboard'),
        default => route('default.dashboard'), // Remplacez par votre route par défaut
    };
}
}



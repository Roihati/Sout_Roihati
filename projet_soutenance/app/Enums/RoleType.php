<?php

namespace App\Enums;

enum RoleType: int
{
    case Fournisseur = 2;
    case Client = 1;
    case Supermarche = 3;

    public function label(): string
    {
        return match($this) {
            self::Fournisseur => 'Fournisseur',
            self::Client => 'Client',
            self::Supermarche => 'Supermarché',
        };
    }
}
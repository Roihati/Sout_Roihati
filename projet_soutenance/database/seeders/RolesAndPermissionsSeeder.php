<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Réinitialiser les permissions et rôles en cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les permissions
        $permissions = [
            'writer',
            'create product',
            'edit product',
            'delete product',
            'manage users',
            'manage roles',
            'manage permissions',
            'manage products',
            'manage orders',
            'manage stock'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Créer les rôles et leur attribuer des permissions
        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleAdmin->givePermissionTo(['manage users', 'manage roles', 'manage permissions', 'manage products', 'manage orders', 'manage stock']);

        $roleUser = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $roleUser->givePermissionTo('edit product');

        $roleFournisseur = Role::firstOrCreate(['name' => 'fournisseur', 'guard_name' => 'web']);
        $roleFournisseur->givePermissionTo('manage products');

        $roleSupermarche = Role::firstOrCreate(['name' => 'supermarche', 'guard_name' => 'web']);
        $roleSupermarche->givePermissionTo('manage orders');

        $roleClient = Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);

        // Assigner des rôles aux utilisateurs spécifiques (vérifiez d'abord que les utilisateurs existent)
        if ($user = User::find(1)) {
            $user->assignRole('client');
        }

        if ($user = User::find(2)) {
            $user->assignRole('fournisseur');
        }

        if ($user = User::find(3)) {
            $user->assignRole('supermarche');
        }

        if ($user = User::find(4)) {
            $user->assignRole('admin');
        }
    }
}

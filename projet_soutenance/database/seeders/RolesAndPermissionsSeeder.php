<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\user;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
         // Reset des permissions et rôles
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Création des permissions
         Permission::create(['name' => 'manage users']);
         Permission::create(['name' => 'manage roles']);
         Permission::create(['name' => 'manage permissions']);
         Permission::create(['name' => 'manage products']);
         Permission::create(['name' => 'manage orders']);
 
         // Création des rôles et assignation des permissions
         $admin = Role::create(['name' => 'admin']);
         $admin->givePermissionTo(['manage users', 'manage roles', 'manage permissions', 'manage products', 'manage orders']);
 
         $fournisseur = Role::create(['name' => 'fournisseur']);
         $fournisseur->givePermissionTo('manage products');
 
         $supermarche = Role::create(['name' => 'supermarche']);
         $supermarche->givePermissionTo('manage orders');

    Role::firstOrCreate(['name' => 'client', 'guard_name' => 'web']);
    Role::firstOrCreate(['name' => 'fournisseur', 'guard_name' => 'web']);
    Role::firstOrCreate(['name' => 'supermarche', 'guard_name' => 'web']);
    Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);


   // Créer un rôle
$role = Role::create(['name' => 'admin']);

// Créer une permission
$permission = Permission::create(['name' => 'manage users']);

// Assigner une permission à un rôle
$role->givePermissionTo('manage users');

// Assigner un rôle à un utilisateur
$user = User::find(1);
$user->assignRole('client'); 
// Créer un rôle
$role = Role::create(['name' => 'admin']);

// Créer une permission
$permission = Permission::create(['name' => 'manage users']);

// Assigner une permission à un rôle
$role->givePermissionTo('manage users');

// Assigner un rôle à un utilisateur
$user = User::find(2);
$user->assignRole('fournisseur');
// Créer un rôle
$role = Role::create(['name' => 'admin']);

// Créer une permission
$permission = Permission::create(['name' => 'manage users']);

// Assigner une permission à un rôle
$role->givePermissionTo('manage users');

// Assigner un rôle à un utilisateur
$user = User::find(3);
$user->assignRole('supermarche');
// Créer un rôle
$role = Role::create(['name' => 'admin']);

// Créer une permission
$permission = Permission::create(['name' => 'manage users']);

// Assigner une permission à un rôle
$role->givePermissionTo('manage users');

// Assigner un rôle à un utilisateur
$user = User::find(4);
$user->assignRole('admin');;
}
}

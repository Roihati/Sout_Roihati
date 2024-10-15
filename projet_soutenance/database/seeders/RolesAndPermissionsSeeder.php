<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
$roleClient = Role::create(['name' => 'client']);
$roleSupplier = Role::create(['name' => 'supplier']);
$roleSupermarket = Role::create(['name' => 'supermarket']);
Permission::create(['name' => 'access client interface']);
Permission::create(['name' => 'access supplier interface']);
Permission::create(['name' => 'access supermarket interface']);

$roleClient->givePermissionTo('access client interface');
$roleSupplier->givePermissionTo('access supplier interface');
$roleSupermarket->givePermissionTo('access supermarket interface');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\models\Role;
/**
 * Class RoleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RoleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Role::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/role');
        CRUD::setEntityNameStrings('role', 'roles');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RoleRequest::class);
        
        CRUD::field('name'); // Ajoutez ce champ pour le nom du rôle
        CRUD::field('guard_name'); // Champ pour le guard_name
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
        $existingRole = Role::where('name', 'NomDuRole')->where('guard_name', 'web')->first();

        if ($existingRole) {
            // Le rôle existe déjà, vous pouvez soit le mettre à jour, soit ignorer l'insertion
            Role::firstOrCreate(
    ['name' => 'NomDuRole', 'guard_name' => 'web'],
    // Les valeurs à insérer si le rôle n'existe pas
    []
);
        } else {
            // Insérez le nouveau rôle
            $role = new Role();
            $role->name = 'NomDuRole';
            $role->guard_name = 'web';
            $role->save();
        }
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }
    

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
   


protected function setupUpdateOperation()
{
    $this->setupCreateOperation(); // Réutilisez la configuration de création
}

    
}

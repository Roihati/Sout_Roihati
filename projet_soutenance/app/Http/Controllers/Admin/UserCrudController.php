<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');

        // Ajouter un champ pour le rôle
        $this->crud->addField([
            'name' => 'role_id', // Nom du champ
            'label' => 'Rôle', // Étiquette affichée
            'type' => 'select', // Type de champ
            'entity' => 'role', // Nom de la relation
            'model' => "App\Models\Role", // Modèle associé
            'attribute' => 'nom', // Attribut à afficher dans le select
            'placeholder' => 'Sélectionnez un rôle', // Placeholder
        ]);

        // Ajouter la colonne dans la liste
        $this->crud->addColumn([
            'name' => 'role_id',
            'label' => 'Rôle',
            'type' => 'select',
            'entity' => 'role', // Nom de la relation
            'model' => "App\Models\Role", // Modèle associé
            'attribute' => 'nom', // Attribut à afficher dans le select
            'options'   => (function ($query) {
                return $query->orderBy('nom', 'ASC')->get();
            }),
        ]);
        
        // Si vous utilisez Spatie pour les rôles, ajoutez ce champ pour les rôles multiples
        $this->crud->addField([
            'name' => 'roles',
            'type' => 'relationship', // Utilise le champ relationship à la place
            'label' => 'Roles',
            'entity' => 'roles',
            'model' => "Spatie\Permission\Models\Role",
            'attribute' => 'name',
            'pivot' => true,
        ]);
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
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
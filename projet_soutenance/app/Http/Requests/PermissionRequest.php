<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'

             'name' => 'required|string|unique:permissions,name|min:3|max:50',
            'guard_name' => 'required|string|in:web,api', // pour limiter à "web" ou "api" seulement
        ];
        
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            
            'name.required' => 'Le nom de la permission est obligatoire.',
            'name.unique' => 'Cette permission existe déjà.',
            'name.min' => 'Le nom de la permission doit contenir au moins 3 caractères.',
            
      
'name.max' => 'Le nom de la permission ne doit pas dépasser 50 caractères.',
            
     
'guard_name.required' => 'Le nom du garde est obligatoire.',
            
 
'guard_name.in' => 'Le nom du garde doit être soit "web" soit "api".',
        ];
    }
}

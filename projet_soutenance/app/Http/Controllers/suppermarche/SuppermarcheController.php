<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supermarche;

class SuppermarcheController extends Controller
{
    public function index(){
        return view("suppermarche.dashboard");

        
    }

    public function index1(Request $request)
    {
        $supermarches = Supermarche::all(); // Récupérer tous les supermarchés
        return view('suppermarche.index', compact('supermarches')); // Passer les données à la vue
    }
        public function create(){

            return view('suppermarche.create'); // Vue du formulaire
        }
    
        public function store(Request $request)
        {
            // Validation des données
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'adresse' => 'required|string|max:255',
                'telephone' => 'required|string|max:15',
                'email' => 'required|email|max:255',
            ]);
    
            // Insertion des données dans la base de données
            supermarche::create($validatedData);
    
            return redirect()->route('suppermarche.index')->with('success', 'Supermarché ajouté avec succès.');
        }
        
    }


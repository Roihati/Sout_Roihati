<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products; // Importer le modèle Products

class CheckStock extends Command
{
    /**
     * Le nom et la signature de la commande.
     *
     * @var string
     */
    protected $signature = 'stock:check';

    /**
     * La description de la commande.
     *
     * @var string
     */
    protected $description = 'Vérifie les niveaux de stock et envoie des alertes de réapprovisionnement si nécessaire';

    /**
     * Exécuter la commande.
     */
    public function handle()
    {
        $produits = Products::whereColumn('quantite_disponible', '<=', 'seuil_reapprovisionnement')->get();

        foreach ($produits as $produit) {
            // Logique d'alerte, par exemple, changer le statut ou envoyer une notification
            $produit->update(['status' => 'rupture']); // Par exemple, changer le statut en "rupture"
            $this->info("Alerte de réapprovisionnement envoyée pour le produit : {$produit->name}");
        }

        $this->info('Vérification des stocks terminée.');
    }
}

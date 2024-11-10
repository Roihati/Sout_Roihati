<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StockAlertNotification;

class CheckStockLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-stock-levels';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check product stock levels and send replenishment alerts if necessary';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        {
            $products = Products::all();
    
            foreach ($products as $product) {
                if ($product->quantite_disponible <= $product->seuil_reapprovisionnement) {
                    $product->status = 'rupture';
                    $product->save();
    
                    // Log or send a notification (email, Slack, etc.)
                    Log::info("Le produit {$product->name} a besoin de réapprovisionnement.");
    
                    // Exemple : Envoyer une notification d'alerte de réapprovisionnement
                    Notification::route('mail', 'fournisseur@example.com')
                        ->notify(new StockAlertNotification($product));
                }
            }
    
            $this->info('Stock levels checked successfully.');
        }
    }
}

<?php

// Importation des contrôleurs
use App\Http\Controllers\suppermarche\InventoryController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\client\Favorite;
use App\Http\Controllers\client\FeedbackController;
use App\Http\Controllers\client\Order;
use App\Http\Controllers\Contact_Mail\ContactController;
use App\Http\Controllers\fournisseur\AbonnementController;
use App\Http\Controllers\fournisseur\CategoryController;
use App\Http\Controllers\fournisseur\CommandeController;
use App\Http\Controllers\fournisseur\FournisseurController;
use App\Http\Controllers\fournisseur\ProductController;
use App\Http\Controllers\fournisseur\ProductsController;
use App\Http\Controllers\fournisseur\RapportController;
use App\Http\Controllers\fournisseur\StockController;
use App\Http\Controllers\fournisseur\SuiviCommandeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\suppermarche\AjouteFournisseurController;
use App\Http\Controllers\suppermarche\AlerteController;
use App\Http\Controllers\suppermarche\CommandesController;
use App\Http\Controllers\suppermarche\Gestion_fournisseurController;
use App\Http\Controllers\suppermarche\ImportantController;
use App\Http\Controllers\suppermarche\InformationController;
use App\Http\Controllers\suppermarche\PromotionController;
use App\Http\Controllers\suppermarche\SuppermarcheController;


use App\Http\Controllers\fournisseur\LigneCommandeController;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\FournisseurMiddleware;
use App\Http\Middleware\SupermarcheMiddleware;
use App\Http\Middleware\Check404\Middleware;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Check404Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes publiques
Route:: get('/', function () {
    return view('welcome');
})->name('acceil');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/inventories', function () {
    return view('suppermarche.inventories');
})->name('inventories');

// Routes pour le contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Ressource pour les promotions
Route::resource('/promotions', PromotionController::class);

// Routes fournisseur après ajout_produit
Route::get('/confirmation', function () {
    return view('fournisseur.confirmation');
})->name('confirmation');

// Routes client avec authentification
Route::get('/Client', function () {
    return view('client.Home');
})->middleware(['auth', 'verified'])->name('Home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__ . '/auth.php';
Route::middleware(['check404'])->group(function () {
 //recherche de produits
Route::get('//errors', [Check404Controller::class, 'check404'])->name('errors.404');


});
// Routes fournisseur protégées par middleware
Route::middleware(['auth', FournisseurMiddleware::class])->group(function () {
    Route::get("/fournisseur/Accueil", [FournisseurController::class, 'index'])->name("fournisseur.accueil");
    
    // Routes produit
    Route::get('/fournisseur/product', [ProductController::class, 'index'])->name('fournisseur.product'); // Pour afficher le formulaire
    Route::post('/fournisseur/product', [ProductController::class, 'store'])->name('fournisseur.product.store'); // Pour traiter le formulaire
    Route::get('/fournisseur/list_product', [ProductController::class, 'list'])->name('fournisseur.list_product');
    
    Route::get('/fournisseur/show', [ProductController::class, 'show'])->name('fournisseur.show');
    Route::get('/fournisseur/{id}/edit', [ProductController::class, 'edit'])->name('fournisseur.update');
    Route::post('/fournisseur/{id}/edit', [ProductController::class, 'update'])->name('fournisseur.update');
    Route::delete('/fournisseur/{id}/delete', [ProductController::class, 'destroy'])->name('fournisseur.delete');

    // Gestion de commandes
    Route::get('/commandes', [CommandeController::class, 'index'])->name('fournisseur.commande');
    Route::post('/commandes', [CommandeController::class, 'store'])->name('fournisseur.commande.store');
    Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('fournisseur.destroy');
    // ligne de commande


Route::get('/lignes/create/{commandeId}', [LigneCommandeController::class, 'create'])->name('fournisseur.lignes');
Route::post('/lignes', [LigneCommandeController::class, 'store'])->name('fournisseur.lignes.store');
//Route::get("/fournisseur/lignecommande", [LigneCommandeController::class, 'ligne'])->name("fournisseur.lignes");

    // Suivi de commande et autres fonctionnalités fournisseur
    Route::get("/fournisseur/suivicommande", [SuiviCommandeController::class, 'suivicommande'])->name("fournisseur.suivicommande");
    Route::get("/fournisseur/Rapport", [RapportController::class, 'rapport'])->name("fournisseur.rapport");

    //category produit
    Route::get('/categories', [CategoryController::class, 'category'])->name('fournisseur.category');
Route::get('/categories/{id}/products', [ProductController::class, 'index'])->name('fournisseur.products');
Route::post('/products', [ProductController::class, 'store'])->name('fournisseur.store');
    Route::get("/fournisseur/category", [CategoryController::class, 'index'])->name("fournisseur.category");

    // Abonnement du supermarché auprès du fournisseur
    Route::prefix('fournisseur')->group(function () {
        Route::get('/abonnements', [AbonnementController::class, 'index'])->name('fournisseur.abonnement');
        Route::post('/abonnements', [AbonnementController::class,'store'])->name('fournisseur.abonnement.store');
        Route::get('/dashboard', [AbonnementController::class, 'dashboard'])->name('fournisseur.dashboard');
        Route::put('/abonnements/{id}/activate', [AbonnementController::class, 'activate'])->name('fournisseur.dashboard.activate');
        Route::put('/abonnements/{id}/deactivate', [AbonnementController::class, 'deactivate'])->name('fournisseur.dashboard.deactivate');

        //gestion des stock

        Route::get('/fournisseur/stocks', [StockController::class, 'index'])->name('fournisseur.stock');
        Route::put('/fournisseur/stocks/{id}', [StockController::class, 'updateStock'])->name('fournisseur.updateStock');

    });
});


// Routes supermarché protégées par middleware
Route::middleware(['auth', SupermarcheMiddleware::class])->group(function () {
    Route::get("/suppermarche/supermaket", [SuppermarcheController::class, 'index'])->name("suppermarche.dashboard");
    
    // Informations et alertes supermarché
    Route::get("/suppermarche/information", [InformationController::class, 'information'])->name("suppermarche.information");
    Route::get("/suppermarche/important", [ImportantController::class, 'important'])->name("suppermarche.important");
    Route::get("/suppermarche/alert", [AlerteController::class, 'alert'])->name("suppermarche.alert");
    
    // Gestion des fournisseurs par le supermarché
    Route::get("/suppermarche/Gestion", [Gestion_fournisseurController::class, 'index'])->name("suppermarche.gerer_fournisseur");
    
    // Inventaires du supermarché
    Route::get("/suppermarche/inventories", [InventoryController::class, 'inventory'])->name('suppermarche.inventorie'); 
    
    // Ajout de fournisseur par le supermarché
    Route::get("/suppermarche/add", [AjouteFournisseurController::class, 'add'])->name("suppermarche.add");

    //ajouter un suppermarche

Route::get("/suppermarche/create",[SuppermarcheController::class, 'create'])->name('suppermarche.create');
Route::post("/supermarche",[SuppermarcheController::class, 'store'])->name('supermarche.store');


Route::get('/supermarches', [SuppermarcheController::class, 'index1'])->name('suppermarche.index');
});

// Routes pour les feedbacks clients
Route::middleware(['auth'])->group(function () {
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('client.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('client.store');
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('client.index');

// Routes pour les produits clients
Route::get('/client/products', [ProductController::class, 'index'])->name('client.products');

// Favoris et commandes clients
Route::get('/favorites', [ProductController::class, 'index'])->name('client.favorite');
Route::get('/orders', [ProductController::class, 'orders'])->name('client.order');

// Routes client protégées par middleware
Route::middleware(['auth', ClientMiddleware::class])->group(function () {
   Route:: get("/client/Home", [ClientController::class,'show'] )-> name ("client.Home");
   Route:: get("/client/favorite", [Favorite::class,'index'] )-> name ("client.favorite");
   Route:: get("/client/order", [Order:: class,'index'] )-> name ("client.order");
});

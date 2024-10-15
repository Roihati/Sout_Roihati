<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Favorites extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function addToFavorites(Request $request, $productId)
{
    $user = Auth::user();
    $user->favorites()->create(['product_id' => $productId]);

    return back()->with('success', 'Product added to favorites!');
}

public function showFavorites()
{
    $user = Auth::user();
    $favorites = $user->favoriteProducts;

    return view('client.favorites', compact('favorites'));
}

    
}

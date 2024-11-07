<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id', 'supermarket_id', 'product_name', 'quantity'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function supermarket()
    {
        return $this->belongsTo(Supermarket::class);
    }
}

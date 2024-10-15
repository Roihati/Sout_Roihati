<?php

namespace App\Models\Exports;

use App\Models\Order; // Assurez-vous que ceci est la bonne classe et namespace
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    public function collection()
    {
        return Order::all();
    }
}
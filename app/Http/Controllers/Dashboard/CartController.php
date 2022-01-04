<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
            'medicine_name' => 'required|string',
            'unit_price' => 'required',
        ]);

        $data['amount'] = $data['quantity'] * $data['unit_price'];

        session()->push('cart', $data);

        return redirect()->route('dashboard.sales.create');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('dashboard.sales.index');
    }
}

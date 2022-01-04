<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::latest()->with('medicine')->paginate(30);

        return view('dashboard.stock.index', compact('stocks'));
    }

    public function create()
    {
        $data = [
            'stock' => new Stock(),
            'medicine' => null,
        ];

        if (request()->has('medicine_id')) {
            $data['medicine'] = Medicine::find((int)request()->medicine_id);
        } else {
            $data['medicines'] = Medicine::pluck('name', 'id')->prepend('Select Medicine', '')->all();
        }

        return view('dashboard.stock.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'mfg_date' => 'required|date|before:today',
            'expiry_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            // 'unit_price' => 'required|numeric',
        ]);

        $data['quantity'] = $data['stock'];
        Stock::create($data);

        return redirect()
            ->route('dashboard.stock.index')
            ->with('stock-success', __('Stock added successfully'));
    }

    public function edit(Stock $stock)
    {
        return view('dashboard.stock.edit', [
            'stock' => $stock,
            'medicine' => null,
            'medicines' => Medicine::pluck('name', 'id')->prepend('Select Medicine', '')->all(),
        ]);
    }

    public function update(Request $request, Stock $stock)
    {
        $data = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'mfg_date' => 'required|date|before:today',
            'expiry_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            // 'unit_price' => 'required|numeric',
        ]);

        $data['quantity'] = $data['stock'];
        $stock->update($data);

        return redirect()
            ->route('dashboard.stock.index')
            ->with('stock-success', __('Stock updated successfully'));
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()
            ->route('dashboard.stock.index')
            ->with('stock-success', __('Stock deleted successfully'));
    }
}

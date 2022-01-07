<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::latest()
            ->when(request()->has('start_date') && request()->has('end_date'), function ($query) {
                return $query->whereBetween('created_at', [request('start_date'), request('end_date')]);
            })
            ->with(['items', 'items.medicine'])
            ->withSum('items', 'quantity')
            ->paginate(30);

        return view('dashboard.sales.index', compact('sales'));
    }

    public function create()
    {
        return view('dashboard.sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paid_amount' => 'required|numeric|min:0',
        ]);

        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->route('dashboard.index')->with('cart-danger', __('Cart is empty'));
        }

        DB::transaction(function () use ($cart, $request) {
            $total_amount = array_sum(array_column($cart, 'amount'));

            $sale = Sale::create([
                'total_amount' => $total_amount,
                'paid_amount' => $request->paid_amount,
            ]);

            $sale->items()->createMany($cart);

            // update medicine stock
            foreach ($cart as $item) {
                $quantity = $item['quantity'];

                while ($quantity) {
                    $stock = Stock::where('medicine_id', $item['medicine_id'])
                        ->Where('stock', '>', 0)
                        ->first();

                    if ($quantity > $stock->stock) {
                        $quantity -= $stock->stock;
                        $stock->update(['stock' => 0]);
                    } else {
                        $stock->decrement('stock', $quantity);
                        $quantity = 0;
                    }
                }
            }

            // clear cart
            session()->forget('cart');
        });

        return redirect()
            ->route('dashboard.sales.index')
            ->with('sale-success', __('Report added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy(Sale $sale)
    {
        $sale->items()->delete();
        $sale->delete();

        return redirect()
            ->route('dashboard.sales.index')
            ->with('sale-success', __('Report deleted successfully'));        
    }
}

<?php

namespace App\Http\Controllers\Pharmacist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $medicines = $request->user()->company->medicines()->with(['company', 'generic', 'dosage'])->withSum('stocks', 'stock')->paginate(30);

        return view('pharmacist.stock.index', compact('medicines'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('pharmacist.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $medicines = [];

        if ($query) {
            $medicines = Medicine::with('dosage')->withSum('stocks', 'stock')->where('name', 'LIKE', "{$query}%")->get();
        }

        return view('search', compact('medicines', 'query'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase(Request $request, Medicine $medicine)
    {

        if (auth()->check()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()
            ->route('login')
            ->with('login-warning', 'Customer must be logged in to purchase');
    }
}

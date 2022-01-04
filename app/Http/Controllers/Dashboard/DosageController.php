<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dosage;
use Illuminate\Http\Request;

class DosageController extends Controller
{
    public function index()
    {
        $dosages = Dosage::latest()->withCount('medicines')->paginate(30);

        return view('dashboard.dosage.index', compact('dosages'));
    }

    public function create()
    {
        return view('dashboard.dosage.create', [
            'dosage' => new Dosage()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:dosages,name',
        ]);

        Dosage::create($data);

        return redirect()
            ->route('dashboard.dosage.index')
            ->with('dosage-success', __('Dosage created successfully.'));
    }

    public function edit(Dosage $dosage)
    {
        return view('dashboard.dosage.edit', compact('dosage'));
    }

    public function update(Request $request, Dosage $dosage)
    {
        $data = $request->validate([
            'name' => 'required|unique:dosages,name,' . $dosage->id,
        ]);

        $dosage->update($data);

        return redirect()
            ->route('dashboard.dosage.index')
            ->with('dosage-success', __('Dosage updated successfully.'));
    }

    public function destroy(Dosage $dosage)
    {
        $dosage->delete();

        return redirect()
            ->route('dashboard.dosage.index')
            ->with('dosage-success', __('Dosage deleted successfully.'));
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dosage;
use App\Models\Company;
use App\Models\Generic;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::oldest()->with(['company', 'generic', 'dosage'])->withSum('stocks', 'stock')->paginate(30);

        return view('dashboard.medicine.index', compact('medicines'));
    }

    public function create()
    {
        $data = [
            'medicine' => new Medicine(),
            'companies' => Company::oldest()->pluck('name', 'id')->prepend('Select Company', '')->all(),
            'generics' => Generic::oldest()->pluck('name', 'id')->prepend('Select Generic', '')->all(),
            'dosages' => Dosage::oldest()->pluck('name', 'id')->prepend('Select Dosage Form', '')->all(),
        ];

        return view('dashboard.medicine.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:medicines',
            'weight' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'generic_id' => 'required|exists:generics,id',
            'dosage_id' => 'required|exists:dosages,id',
        ], [], [
            'company_id' => 'Company',
            'generic_id' => 'Generic',
            'dosage_id' => 'Dosage Form',
        ]);

        Medicine::create($data);

        return redirect()
            ->route('dashboard.medicine.index')
            ->with('medicine-success', __('Medicine created successfully'));
    }

    public function edit(Medicine $medicine)
    {
        $data = [
            'medicine' => $medicine,
            'companies' => Company::oldest()->pluck('name', 'id')->prepend('Select Company', '')->all(),
            'generics' => Generic::oldest()->pluck('name', 'id')->prepend('Select Generic', '')->all(),
            'dosages' => Dosage::oldest()->pluck('name', 'id')->prepend('Select Dosage Form', '')->all(),
        ];

        return view('dashboard.medicine.edit', $data);
    }

    public function update(Request $request, Medicine $medicine)
    {
        $data = $request->validate([
            'name' => 'required|unique:medicines,name,' . $medicine->id,
            'weight' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'generic_id' => 'required|exists:generics,id',
            'dosage_id' => 'required|exists:dosages,id',
        ], [], [
            'company_id' => 'Company',
            'generic_id' => 'Generic',
            'dosage_id' => 'Dosage Form',
        ]);

        $medicine->update($data);

        return redirect()
            ->route('dashboard.medicine.index')
            ->with('medicine-success', __('Medicine updated successfully'));
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()
            ->route('dashboard.medicine.index')
            ->with('medicine-success', __('Medicine deleted successfully'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $medicines = [];

        if ($query) {
            $medicines = Medicine::with('dosage')->withSum('stocks', 'stock')->where('name', 'LIKE', "{$query}%")->get();
        }

        return view('dashboard.medicine.search', compact('medicines', 'query'));
    }
}

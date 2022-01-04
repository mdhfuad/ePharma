<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('medicines')->with('pharmacist:id,name')->paginate(20);

        return view('dashboard.company.index', compact('companies'));
    }

    public function create()
    {
        return view('dashboard.company.create', [
            'company' => new Company(),
            'pharmacist' => User::pharmacist()->pluck('name', 'id')->prepend('Select Pharmacist', null)->all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3,max:255|unique:companies',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'user_id' => ['required', Rule::exists('users', 'id')->where('role', 'pharmacist')],
        ]);

        // TODO: Logo upload
        Company::create($data);

        return redirect()
            ->route('dashboard.company.index')
            ->with('company-success', __('Company created successfully.'));
    }

    public function show(Company $company)
    {
        $medicines = $company->medicines()->with(['company', 'generic', 'dosage'])->withSum('stocks', 'stock')->paginate(30);

        return view('dashboard.company.show', compact('company', 'medicines'));
    }

    public function edit(Company $company)
    {
        return view('dashboard.company.edit', [
            'company' => $company,
            'pharmacist' => User::pharmacist()->pluck('name', 'id')->prepend('Select Pharmacist', null)->all()
        ]);
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3,max:255', Rule::unique('companies')->ignore($company)],
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'user_id' => ['required', Rule::exists('users', 'id')->where('role', 'officer')],
        ]);

        $company->update($data);

        return redirect()
            ->route('dashboard.company.index')
            ->with('company-success', __('Company updated successfully.'));
    }

    public function destroy(Company $company)
    {
        // TODO: Enable soft delete
        $company->delete();

        return redirect()
            ->route('dashboard.company.index')
            ->with('company-success', __('Company deleted successfully.'));
    }
}

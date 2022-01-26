<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::with('manager:id,name')->paginate(30);

        return view('dashboard.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('dashboard.branches.create', [
            'branch' => new Branch(),
            'managers' => User::managers()->pluck('name', 'id')->prepend('Select Manager', null)->all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:branches',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:4,20',
            'email' => 'required|email|max:255',
            'website' => 'sometimes|nullable|url|max:255',
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')->where('role', 'manager')],
        ], [], ['user_id' => 'manager']);

        Branch::create($data);

        return redirect()
            ->route('dashboard.branches.index')
            ->with('branches-success', __('Branch created successfully'));
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit(Branch $branch)
    {
        return view('dashboard.branches.edit', [
            'branch' => $branch,
            'managers' => User::managers()->get(),
        ]);
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('branches')->ignore($branch)],
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:4,20',
            'email' => 'required|email|max:255',
            'website' => 'sometimes|nullable|url|max:255',
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')->where('role', 'manager')],
        ], [], ['user_id' => 'manager']);

        $branch->update($data);

        return redirect()
            ->route('dashboard.branches.index')
            ->with('branches-success', __('Branch updated successfully'));
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()
            ->route('dashboard.branches.index')
            ->with('branches-success', __('Branch deleted successfully'));
    }
}

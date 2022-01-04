<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Generic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenericController extends Controller
{
    public function index()
    {
        $generics = Generic::withCount('medicines')->oldest()->paginate(30);

        return view('dashboard.generic.index', compact('generics'));
    }

    public function create()
    {
        return view('dashboard.generic.create', [
            'generic' => new Generic(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:generics',
            'description' => 'nullable|string',
        ]);

        $generic = Generic::create($data);

        return redirect()
            ->route('dashboard.generic.index')
            ->with('generic-success', __('Generic created successfully.'));
    }

    public function edit(Generic $generic)
    {
        return view('dashboard.generic.edit', compact('generic'));
    }

    public function update(Request $request, Generic $generic)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:generics,name,' . $generic->id,
            'description' => 'nullable|string',
        ]);

        $generic->update($data);

        return redirect()
            ->route('dashboard.generic.index')
            ->with('generic-success', __('Generic updated successfully.'));
    }

    public function destroy(Generic $generic)
    {
        $generic->delete();

        return redirect()
            ->route('dashboard.generic.index')
            ->with('generic-success', __('Generic deleted successfully.'));
    }
}

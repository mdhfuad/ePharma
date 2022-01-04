<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::oldest()->paginate(20);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create', ['user' => new User()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:4,20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::default()],
            'role' => ['required', Rule::in(User::roles())],
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('dashboard.users.index')
            ->with('user-success', __('User created successfully.'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:4,20',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['sometimes', 'nullable', Rules\Password::default()],
            'role' => ['required', Rule::in(User::roles())],
        ]);

        // User can't change his own role
        if ($user->is(auth()->user())) {
            $data = Arr::except($data, 'role');
        }

        // Hash password if it was changed
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, 'password');
        }

        // Update user
        $user->update($data);

        return redirect()
            ->route('dashboard.users.index')
            ->with('user-success', __('User updated successfully.'));
    }


    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) {
            return redirect()
                ->route('dashboard.users.index')
                ->with('user-danger', __('You can not delete yourself.'));
        }

        $user->delete();

        return redirect()
            ->route('dashboard.users.index')
            ->with('user-success', __('User deleted successfully.'));
    }
}

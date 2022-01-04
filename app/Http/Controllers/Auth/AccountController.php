<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit()
    {
        return view('account.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['sometimes', 'nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Update User Info
        $user->name = $data['name'];
        $user->email = $data['email'];

        // Update Password
        if ($data['password']) {
            $user->password = Hash::make($data['password']);
        }

        // Save changes
        $user->save();

        return redirect()
            ->route('account.edit')
            ->with('account-success', __('Account updated successfully.'));
    }
}

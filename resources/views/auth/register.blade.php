<x-guest-layout title="Create new account">
    <x-auth-card>
        <form method="POST" action="{{ route('register') }}" class="card-body">
            @csrf
            <h1 class="card-title text-center mb-4">Create new account</h1>

            <div class="mb-3">
                <x-form.input label="Name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mb-3">
                <x-form.input label="Email address" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mb-3">
                <x-form.input label="Password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mb-3">
                <x-form.input label="Confirm Password" type="password" name="password_confirmation" required />
            </div>

            <div class="form-footer">
                <button class="btn btn-primary w-100">Register</button>
            </div>
        </form>
    </x-auth-card>
    <div class="text-center text-muted mt-3">
        Already have account? <a href="{{ route('login') }}" tabindex="-1">Login</a>
    </div>
</x-guest-layout>

<x-guest-layout title="Forgot Password">
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="card-body">
            @csrf
            <h1 class="card-title text-center mb-4">Forgot Password</h1>
            <p class="text-muted mb-4">
                Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset link that will allow you to choose a new one.
            </p>

            <x-form.input label="Email address" type="email" name="email" :value="old('email')" required autofocus />
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

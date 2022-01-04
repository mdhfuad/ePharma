<x-guest-layout title="Confirm Password">
    <x-auth-card>
        <form method="POST" action="{{ route('password.confirm') }}" class="card-body">
            @csrf
            <h1 class="card-title text-center mb-4">Confirm Password</h1>
            <p class="text-muted mb-4">
                This is a secure area of the application. Please confirm your password before continuing.
            </p>
            <x-form.input label="Password" type="password" name="password" required autocomplete="current-password" />
            <div class="form-footer">
                <button class="btn btn-primary w-100">
                    Confirm
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

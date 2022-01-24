<x-guest-layout title="Login">
    <x-auth-card>
        <form method="POST" action="{{ route('login') }}" class="card-body">
            @csrf
            <h1 class="card-title text-center mb-4">Login to your account</h1>
            <x-flash-alert name="login" />
            <div class="mb-3">
                <x-form.input label="Email address" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">
                    Password
                    <span class="form-label-description">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </span>
                </label>
                <x-form.input type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <span class="form-check-label">Keep me logged in</span>
                </label>
            </div>

            <div class="form-footer">
                <button class="btn btn-primary w-100">Sign In</button>
            </div>
        </form>
    </x-auth-card>
    {{-- <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Register</a>
    </div> --}}
</x-guest-layout>

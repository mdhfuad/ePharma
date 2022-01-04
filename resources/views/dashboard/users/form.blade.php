<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" :value="old('name', $user->name)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Phone number" name="phone" :value="old('phone', $user->phone)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Email address" name="email" :value="old('email', $user->email)" />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div x-data="{show:false}" class="input-group input-group-flat @error('password') is-invalid @enderror">
            <input name="password" :type="show ? 'text' : 'password'"
                class="form-control @error('password') is-invalid @enderror" autocomplete="off">
            <span class="input-group-text">
                <a href="#" @click.prevent="show=!show" class="input-group-link"
                    x-text="(show ? 'Hide' : 'Show') + ' Password'"></a>
            </span>
        </div>
        @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
            <option value="">Select role</option>
            @foreach ($user->roles() as $role)
                <option value="{{ $role }}" {{ old('role', $user->role) === $role ? 'selected' : '' }}>
                    {{ ucfirst($role) }}</option>
            @endforeach
        </select>
        @error('role')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endpush

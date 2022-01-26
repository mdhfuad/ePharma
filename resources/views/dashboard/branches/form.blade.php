<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" :value="old('name', $branch->name)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Address" name="address" :value="old('address', $branch->address)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Phone" name="phone" :value="old('phone', $branch->phone)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Email" name="email" :value="old('email', $branch->email)" />
    </div>
    <div class="mb-3">
        <x-form.input label="Website" name="website" :value="old('website', $branch->website)" />
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">Branch Manager </label>
        <select name="user_id" id="user_id" class="form-select @error('user_id')is-invalid @enderror">
            @foreach ($managers as $id => $name)
                <option value="{{ $id }}" {{ $id == old('user_id', $branch->user_id) ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        <x-form.error field="user_id" />
    </div>
    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

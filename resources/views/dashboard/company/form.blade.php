<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" type="text" :value="old('name', $company->name)" required />
    </div>
    <div class="mb-3">
        <x-form.input label="Phone" name="phone" type="text" :value="old('phone', $company->phone)" required />
    </div>
    <div class="mb-3">
        <x-form.input label="Address" name="address" type="text" :value="old('address', $company->address)" required />
    </div>

    {{-- <div class="mb-3">
        <x-form.input label="Website" name="webiste" type="url" placeholder="https://example.com"
            :value="old('website', $company->website)" />
    </div> --}}

    <div class="mb-3">
        <label for="user_id" class="form-label">Pharmacist</label>
        <select name="user_id" id="user_id" class="form-select">
            @foreach ($pharmacist as $id => $name)
                <option value="{{ $id }}" {{ old('user_id', $company->user_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>

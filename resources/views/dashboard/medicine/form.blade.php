<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" :value="old('name', $medicine->name)" required />
    </div>
    <div class="mb-3">
        <x-form.input label="Weight in mg" name="weight" type="number" :value="old('weight', $medicine->weight)"
            required />
    </div>
    <div class="mb-3">
        <x-form.input label="Price Per Unit" name="unit_price" type="number" step="0.01"
            :value="old('unit_price', $medicine->unit_price)" required />
    </div>
    <div class="mb-3">
        <label for="generic" class="form-label">Generic</label>
        <select name="generic_id" id="generic" class="form-select @error('generic_id') is-invalid @enderror" required>
            @foreach ($generics as $id => $generic)
                <option value="{{ $id }}"
                    {{ old('generic_id', $medicine->generic_id) == $id ? 'selected' : '' }}>
                    {{ $generic }}
                </option>
            @endforeach
        </select>
        <x-form.error field="generic_id" />
    </div>
    <div class="mb-3">
        <label for="dosage" class="form-label">Dosage</label>
        <select name="dosage_id" id="dosage" class="form-select @error('dosage_id') is-invalid @enderror" required>
            @foreach ($dosages as $id => $dosage)
                <option value="{{ $id }}"
                    {{ old('dosage_id', $medicine->dosage_id) == $id ? 'selected' : '' }}>
                    {{ $dosage }}
                </option>
            @endforeach
        </select>
        <x-form.error field="dosage_id" />
    </div>
    <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <select name="company_id" id="company" class="form-select @error('company_id') is-invalid @enderror" required>
            @foreach ($companies as $id => $company)
                <option value="{{ $id }}"
                    {{ old('company_id', $medicine->company_id) == $id ? 'selected' : '' }}>
                    {{ $company }}
                </option>
            @endforeach
        </select>
        <x-form.error field="company_id" />
    </div>
    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

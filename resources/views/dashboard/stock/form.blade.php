<div class="card-body">
    @if ($medicine)
        <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
    @else
        <div class="mb-3">
            <label for="medicine" class="form-label">Medicine</label>
            <select name="medicine_id" id="medicine" class="form-select @error('medicine_id') is-invalid @enderror">
                @foreach ($medicines as $id => $medicine)
                    <option value="{{ $id }}" {{ $id == old('medicine_id') ? 'selected' : '' }}>
                        {{ $medicine }}
                    </option>
                @endforeach
            </select>
            <x-form.error field="medicine_id" />
        </div>
    @endif

    <div class="mb-3">
        <x-form.input name="name" label="Batch Name" required="required" :value="old('name', $stock->name)" />
    </div>

    <div class="mb-3">
        <x-form.input name="stock" label="Stock Quantity" required="required" :value="old('stock', $stock->stock)" />
    </div>

    <div class="mb-3">
        <x-form.input name="mfg_date" type="date" label="MFG Date" required="required"
            :value="old('mfg_date', $stock->mfg_date?->format('Y-m-d'))" class="bg-white" />
    </div>

    <div class="mb-3">
        <x-form.input name="expiry_date" type="date" label="Expiry Date" required="required"
            :value="old('expiry_date', $stock->expiry_date?->format('Y-m-d'))" />
    </div>

    <div class="mb-3">
        <x-form.input name="purchase_price" type="number" label="Purchase Price (Total)" required="required"
            :value="old('purchase_price', $stock->purchase_price)" />
    </div>

    {{-- <div class="mb-3">
        <x-form.input name="unit_price" type="number" label="Price Per Unit (Selling)" required="required"
            :value="old('unit_price')" />
    </div> --}}

    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" :value="old('name', $dosage->name)" required />
    </div>
    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

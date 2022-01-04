<div class="card-body">
    <div class="mb-3">
        <x-form.input label="Name" name="name" :value="old('name', $generic->name)" required />
    </div>
    {{-- <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            rows="4">{{ old('description', $generic->description) }}</textarea>
        <x-form.error field="description" />
    </div> --}}
    <div class="form-footer text-end">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

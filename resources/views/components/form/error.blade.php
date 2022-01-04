@props(['field'])

@error($field)
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
@enderror

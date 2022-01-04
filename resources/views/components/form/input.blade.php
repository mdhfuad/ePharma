@props(['name', 'label' => null, 'error' => true])

@if ($label)
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<input
    {{ $attributes->class(['form-control', 'is-invalid' => $error && $errors->has($name)])->merge(['id' => $name, 'name' => $name]) }} />

@if ($error && $errors->has($name))
    <div class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($name) }}</strong>
    </div>
@endif

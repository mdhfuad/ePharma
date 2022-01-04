@props(['name'])

@php
$types = [
    'success' => 'check',
    'info' => 'info-circle',
    'warning' => 'alert-triangle',
    'danger' => 'alert-circle',
];
@endphp

@foreach ($types as $type => $icon)
    @if (Session::has($name . '-' . $type))
        <div class="alert alert-important alert-{{ $type }} alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <x-icon :name="$icon" class="icon alert-icon" />
                </div>
                <div>
                    {{ session($name . '-' . $type) }}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
@endforeach

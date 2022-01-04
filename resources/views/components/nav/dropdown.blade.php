@props(['text', 'id', 'icon', 'active' => false])

<li class="nav-item">
    <a href="#{{ $id }}" class="nav-link" data-bs-toggle="collapse" aria-expanded="{{ $active }}">
        <span class="nav-link-icon">
            <x-icon :name="$icon" />
        </span>
        <span class="nav-link-title">{{ $text }}</span>
        <span class="nav-link-toggle"></span>
    </a>
    <ul {{ $attributes->class(['nav nav-pills collapse', 'show' => $active])->merge(['id' => $id]) }}>
        {{ $slot }}
    </ul>
</li>

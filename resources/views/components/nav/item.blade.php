@props(['icon' => false, 'active' => false])

<li class="nav-item">
    <a {{ $attributes->class(['nav-link', 'active' => $active]) }}>
        @if ($icon)
            <span class="nav-link-icon">
                <x-icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $slot }}</span>
    </a>
</li>

@props(['name'])
<svg {!! $attributes->class('icon')->merge(['width' => 24, 'height' => 24]) !!}>
    <use xlink:href="{{ asset('css/tabler-sprite.svg#tabler-' . $name) }}" />
</svg>

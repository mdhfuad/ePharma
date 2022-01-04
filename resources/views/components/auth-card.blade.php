<div class="text-center py-4">
    <a href="{{ route('home') }}">
        <x-application-logo height="36" />
    </a>
</div>
<section {{ $attributes->merge(['class' => 'card card-md']) }}>
    {{ $slot }}
</section>

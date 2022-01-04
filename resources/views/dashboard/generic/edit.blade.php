<x-app-layout title="Edit Generic">
    <x-page-header title="Edit Generic" />

    <section class="page-body">
        <form action="{{ route('dashboard.generic.update', $generic) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.generic.form')
        </form>
    </section>
</x-app-layout>

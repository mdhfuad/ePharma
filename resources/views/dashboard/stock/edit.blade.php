<x-app-layout title="Edit Stock">
    <x-page-header title="Edit Stock" />

    <section class="page-body">
        <form action="{{ route('dashboard.stock.update', $stock) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.stock.form')
        </form>
    </section>
</x-app-layout>

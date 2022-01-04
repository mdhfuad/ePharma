<x-app-layout title="Create New Stock">
    <x-page-header title="Create New Stock" />

    <section class="page-body">
        <form action="{{ route('dashboard.stock.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.stock.form')
        </form>
    </section>
</x-app-layout>

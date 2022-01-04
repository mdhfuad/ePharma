<x-app-layout title="Add Generic">
    <x-page-header title="Add Generic" />

    <section class="page-body">
        <form action="{{ route('dashboard.generic.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.generic.form')
        </form>
    </section>
</x-app-layout>

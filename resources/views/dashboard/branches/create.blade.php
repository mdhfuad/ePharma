<x-app-layout title="Add Branch">
    <x-page-header title="Add Branch" />

    <section class="page-body">
        <form action="{{ route('dashboard.branches.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.branches.form')
        </form>
    </section>
</x-app-layout>

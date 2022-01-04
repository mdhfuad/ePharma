<x-app-layout title="Add User">
    <x-page-header title="Add User" />

    <section class="page-body">
        <form action="{{ route('dashboard.users.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.users.form')
        </form>
    </section>
</x-app-layout>

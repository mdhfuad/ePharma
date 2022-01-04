<x-app-layout title="Edit User">
    <x-page-header title="Edit User" />

    <section class="page-body">
        <form action="{{ route('dashboard.users.update', $user) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.users.form')
        </form>

    </section>
</x-app-layout>

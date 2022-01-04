<x-app-layout title="Edit Branch">
    <x-page-header title="Edit Branch" />

    <section class="page-body">
        <form action="{{ route('dashboard.branches.update', $branch) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.branches.form')
        </form>
    </section>
</x-app-layout>

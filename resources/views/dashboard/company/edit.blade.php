<x-app-layout title="Edit Company">
    <x-page-header title="Edit Company" />

    <section class="page-body">
        <form action="{{ route('dashboard.company.update', $company) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.company.form')
        </form>
    </section>
</x-app-layout>

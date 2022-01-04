<x-app-layout title="Add Company">
    <x-page-header title="Add Company" />

    <section class="page-body">
        <form action="{{ route('dashboard.company.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.company.form')
        </form>
    </section>
</x-app-layout>

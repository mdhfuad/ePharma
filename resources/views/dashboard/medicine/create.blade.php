<x-app-layout title="Add Medicine">
    <x-page-header title="Add Medicine" />

    <section class="page-body">
        <form action="{{ route('dashboard.medicine.store') }}" method="POST" class="card">
            @csrf
            @include('dashboard.medicine.form')
        </form>
    </section>
</x-app-layout>

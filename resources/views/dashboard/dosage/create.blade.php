<x-app-layout title="Add Dosage">
    <x-page-header title="Add Dosage" />

    <section class="page-body">
        <form action="{{ route('dashboard.dosage.store') }}" method="post" class="card">
            @csrf
            @include('dashboard.dosage.form')
        </form>
    </section>
</x-app-layout>

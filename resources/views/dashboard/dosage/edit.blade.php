<x-app-layout title="Edit Dosage">
    <x-page-header title="Edit Dosage" />

    <section class="page-body">
        <form action="{{ route('dashboard.dosage.update', $dosage) }}" method="post" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.dosage.form')
        </form>
    </section>
</x-app-layout>

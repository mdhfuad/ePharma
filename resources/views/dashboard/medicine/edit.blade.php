<x-app-layout title="Edit Medicine">
    <x-page-header title="Edit Medicine" />

    <section class="page-body">
        <form action="{{ route('dashboard.medicine.update', $medicine) }}" method="POST" class="card">
            @csrf
            @method('PUT')
            @include('dashboard.medicine.form')
        </form>
    </section>
</x-app-layout>

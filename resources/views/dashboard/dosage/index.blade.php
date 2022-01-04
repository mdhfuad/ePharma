<x-app-layout title="Manage Dosage Forms">
    <x-page-header title="Manage Dosage Forms">
        <a href="{{ route('dashboard.dosage.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Dosage
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="dosage" />

        <div class="card">
            <div class="card-header">Dosage Forms</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Medicines</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosages as $dosage)
                            <tr>
                                <td><strong>{{ $dosage->name }}</strong></td>
                                <td>{{ $dosage->medicines_count }}</td>
                                <td>{{ $dosage->updated_at->diffForHumans() }}</td>
                                <td>{{ $dosage->created_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.dosage.edit', $dosage) }}"
                                        class="btn btn-icon btn-secondary">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.dosage.destroy', $dosage)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No Dosage Forms</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $dosages->links() }}
        </div>
    </section>
    <x-modal.confirm-delete />
</x-app-layout>

<x-app-layout title="Manage Generics">
    <x-page-header title="Manage Generics">
        <a href="{{ route('dashboard.generic.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Generic
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="generic" />

        <div class="card">
            <div class="card-header">Generics</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Medicines</th>
                            <th>Updated at</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($generics as $generic)
                            <tr>
                                <td><strong>{{ $generic->name }}</strong></td>
                                <td>{{ $generic->medicines_count }}</td>
                                <td>{{ $generic->updated_at->diffForHumans() }}</td>
                                <td>{{ $generic->created_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.generic.edit', $generic) }}"
                                        class="btn btn-icon btn-secondary">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.generic.destroy', $generic)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No generics found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $generics->links() }}
        </div>
    </section>

    <x-modal.confirm-delete />
</x-app-layout>

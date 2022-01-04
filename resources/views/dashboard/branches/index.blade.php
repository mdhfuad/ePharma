<x-app-layout title="Manage Branches">
    <x-page-header title="Manage Branches">
        <a href="{{ route('dashboard.branches.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Branch
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="branches" />

        <div class="card">
            <div class="card-header">Branches</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Manager</th>
                            <th>Phone</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branches as $branch)
                            <tr>
                                <td><strong>{{ $branch->name }}</strong></td>
                                <td>{{ $branch->address }}</td>
                                <td><span class="badge bg-purple-lt">{{ $branch->manager->name }}</span></td>
                                <td>
                                    <a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a>
                                </td>
                                <td>{{ $branch->updated_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.branches.edit', $branch) }}" class="btn btn-icon">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.branches.destroy', $branch)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No Branches Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <x-modal.confirm-delete />
</x-app-layout>

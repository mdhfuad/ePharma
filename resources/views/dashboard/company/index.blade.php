<x-app-layout title="Manage Companies">
    <x-page-header title="Manage Companies">
        <a href="{{ route('dashboard.company.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Company
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="company" />

        <div class="card">
            <div class="card-header">Companies</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Pharmacist</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr>
                                <td>
                                    <a href="{{ route('dashboard.company.show', $company) }}">
                                        <strong>{{ $company->name }}</strong>
                                    </a>
                                    <br>
                                    <small class="text-muted">Medicines: {{ $company->medicines_count }}</small>
                                </td>
                                <td>
                                    <small>
                                        {{ $company->phone }} <br>
                                        {{ $company->address }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-purple-lt">{{ $company->pharmacist->name }}</span>
                                </td>
                                <td>{{ $company->updated_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.company.edit', $company) }}"
                                        class="btn btn-icon btn-secondary">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.company.destroy', $company)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">No companies found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $companies->links() }}
        </div>
    </section>
    <x-modal.confirm-delete />
</x-app-layout>

<x-app-layout title="Manage Medicines">
    <x-page-header title="Manage Medicines">
        <a href="{{ route('dashboard.medicine.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Medicine
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="medicine" />

        <div class="card">
            <div class="card-header">Medicines</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Dosage Form</th>
                            <th>Company</th>
                            <th>Stock</th>
                            <th>Price/Unit</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicines as $medicine)
                            <tr>
                                <td>
                                    <strong>{{ $medicine->name }}</strong>
                                    <small title="Weight" class="text-muted">{{ $medicine->weight }}mg</small><br>
                                    <small class="text-muted">{{ $medicine->generic->name }}</small>
                                </td>
                                <td>{{ $medicine->dosage->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.company.show', $medicine->company) }}">
                                        {{ $medicine->company->name }}
                                    </a>
                                </td>
                                <td>
                                    @if ($medicine->stocks_sum_stock)
                                        <span class="badge bg-lime-lt">{{ $medicine->stocks_sum_stock }}</span>
                                    @else
                                        <span class="badge bg-red-lt">Stock Out</span>
                                    @endif
                                </td>
                                <td>{{ $medicine->unit_price }}</td>
                                <td>{{ $medicine->updated_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.stock.create', ['medicine_id' => $medicine]) }}"
                                        data-bs-toggle="tooltip" title="Add Stock" class="btn btn-icon btn-success">
                                        <x-icon name="plus" />
                                    </a>
                                    <a href="{{ route('dashboard.medicine.edit', $medicine) }}"
                                        class="btn btn-icon btn-secondary">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.medicine.destroy', $medicine)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No medicine Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $medicines->links() }}
        </div>
    </section>
    <x-modal.confirm-delete />
</x-app-layout>

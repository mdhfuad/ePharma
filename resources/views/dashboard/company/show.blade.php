<x-app-layout title="Medicines of {{ $company->name }}">
    <x-page-header title="Medicines of {{ $company->name }}" />

    <section class="page-body">
        <div class="card">
            <div class="card-header">
                Medicines of {{ $company->name }}
            </div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Dosage Form</th>
                            <th>Stock Count</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicines as $medicine)
                            <tr>
                                <td>
                                    <a href="{{ route('dashboard.medicine.edit', $medicine) }}">
                                        <strong>{{ $medicine->name }}</strong>
                                    </a>
                                    <small title="Weight" class="text-muted">{{ $medicine->weight }}mg</small> <br>
                                    <small title="Generic"
                                        class="text-muted">{{ $medicine->generic->name }}</small>
                                </td>
                                <td>{{ $medicine->dosage->name }}</td>
                                <td>
                                    @if ($medicine->stocks_sum_stock)
                                        {{ $medicine->stocks_sum_stock }}
                                    @else
                                        <span class="badge bg-red-lt text-red">Stock Out</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $medicine->unit_price }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.stock.create', ['medicine_id' => $medicine]) }}"
                                        data-bs-toggle="tooltip" title="Add Stock" class="btn btn-icon btn-success">
                                        <x-icon name="plus" />
                                    </a>
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
</x-app-layout>

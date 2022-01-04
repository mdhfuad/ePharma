<x-app-layout title="Medicine and Stocks">
    <x-page-header title="Medicines and Stocks" />

    <section class="page-body">
        <div class="card">
            <div class="card-header">Medicines of "<b>{{ auth()->user()->company->name }}</b>"</div>
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
                                <td>{{ $medicine->company->name }}</td>
                                <td>
                                    @if ($medicine->stocks_sum_stock)
                                        <span class="badge bg-info-lt">{{ $medicine->stocks_sum_stock }}</span>
                                    @else
                                        <span class="badge bg-red-lt">Stock Out</span>
                                    @endif
                                </td>
                                <td>{{ $medicine->unit_price }}</td>
                                <td>{{ $medicine->updated_at->diffForHumans() }}</td>
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

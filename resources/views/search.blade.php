<div class="card-table table-responsive">
    <table class="table table-vcenter table-nowrap">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Dosage Form</th>
                <th>Stock</th>
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
                        <small title="Generic" class="text-muted">{{ $medicine->generic->name }}</small>
                    </td>
                    <td>{{ $medicine->dosage->name }}</td>
                    <td>
                        @if ($medicine->stocks_sum_stock)
                            <span class="badge bg-green-lt">Available</span>
                        @else
                            <span class="badge bg-red-lt">Stock Out</span>
                        @endif
                    </td>
                    <td>
                        {{ $medicine->unit_price }}
                    </td>
                    <td>
                        <a href="{{ route('medicine.purchase', $medicine) }}" class="btn btn-primary {{ !$medicine->stocks_sum_stock ? 'disabled' : '' }}">Purchase</a>
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

<div class="card-table table-responsive">
    <table class="table table-vcenter table-nowrap">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Dosage Form</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Quantity</th>
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
                            {{ $medicine->stocks_sum_stock }}
                        @else
                            <span class="badge bg-red-lt text-red">Stock Out</span>
                        @endif
                    </td>
                    <td>
                        {{ $medicine->unit_price }}
                    </td>
                    <td class="w-1">
                        @if ($medicine->stocks_sum_stock)
                            <input fo type="number" class="form-control" name="quantity" value="1" min="1"
                                max="{{ $medicine->stocks_sum_stock }}" form="medicine_{{ $medicine->id }}">
                        @else
                            <input type="number" class="form-control" name="quantity" value="0" disabled>
                        @endif
                    </td>
                    <td class="text-end">
                        <form action="{{ route('dashboard.cart.store') }}" method="post"
                            id="medicine_{{ $medicine->id }}">
                            @csrf
                            <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                            <input type="hidden" name="medicine_name" value="{{ $medicine->name }}">
                            <input type="hidden" name="unit_price" value="{{ $medicine->unit_price }}">
                            <button type="submit" class="btn btn-primary"
                                {{ !$medicine->stocks_sum_stock ? 'disabled' : '' }}>
                                Add to cart
                            </button>
                        </form>
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

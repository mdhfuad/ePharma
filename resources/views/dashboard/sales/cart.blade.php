@php
$total_amount = array_sum(array_column(session('cart'), 'amount'));
@endphp
<form action="{{ route('dashboard.sales.store') }}" method="POST" class="card">
    @csrf
    <div class="card-header">Sale Cart</div>
    <div class="card-table table-responsive">
        <table class="table table-vcenter table-nowrap">
            <thead>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Price</th>
            </thead>
            <tbody>
                @forelse ((session('cart')) as $item)
                    <tr>
                        <td><strong>{{ $item['medicine_name'] }}</strong></td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['amount'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No items in cart</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-end">
                        <strong>Total Amount:</strong>
                    </td>
                    <td>{{ $total_amount }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end">
                        <strong>Paid Amount:</strong>
                    </td>
                    <td class="col-2">
                        <x-form.input name="paid_amount" type="number" step="0.01" :value="$total_amount" required />
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer text-center">
        <a href="{{ route('dashboard.cart.clear') }}" class="btn btn-danger">Clear Cart</a>
        <button type="submit" class="btn btn-success">
            Save Report
        </button>
    </div>
</form>

<x-app-layout title="Sales Report">
    <x-page-header title="Sales Report">
        <a href="{{ route('dashboard.sales.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Sale
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="sale" />

        <form action="" method="get" class="row mb-3">
            <div class="col-12 col-md-2">
                <input type="date" name="start_date" class="form-control" placeholder="Start Date"
                    value="{{ request('start_date') }}">
            </div>
            <div class="col-12 col-md-2">
                <input type="date" name="end_date" class="form-control" placeholder="End Date"
                    value="{{ request('end_date') }}">
            </div>
            <div class="col-12 col-md-2">
                <button type="submit" class="btn btn-info">
                    Generate
                </button>
            </div>
        </form>
        <div class="card">
            <div class="card-header justify-content-between">
                Sales Report
                <button onclick="window.print()" class="btn btn-light d-print-none">
                    <x-icon name="printer" /> Print
                </button>
            </div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>
                                    {{ $sale->items->map(fn($item) => $item->medicine->name)->implode(', ') }}
                                </td>
                                <td>{{ $sale->items_sum_quantity }}</td>
                                <td>{{ $sale->total_amount }}</td>
                                <td>{{ $sale->paid_amount }}</td>
                                <td>{{ $sale->created_at->toFormattedDateString() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No sales report found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $sales->withQueryString()->links() }}
        </div>
    </section>

    @push('head')
        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('js/flatpickr.js') }}"></script>
        <script>
            flatpickr('input[type="date"]', {
                dateFormat: "Y-m-d",
                maxDate: "today"
            });
        </script>

    @endpush
</x-app-layout>

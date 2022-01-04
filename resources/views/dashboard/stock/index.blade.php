<x-app-layout title="Medicine Stock">
    <x-page-header title="Medicine Stock">
        <a href="{{ route('dashboard.stock.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add Stock
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="stock" />

        <div class="card">
            <div class="card-header justify-content-between">
                Stocks
                <button onclick="window.print()" class="btn btn-light d-print-none">
                    <x-icon name="printer" /> Print
                </button>
            </div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Medicine</th>
                            <th>Quantity</th>
                            <th>Stock</th>
                            <th>Purchase Price</th>
                            <th>Expires</th>
                            <th>Added</th>
                            <th class="d-print-none"></th>
                        </tr>
                    <tbody>
                        @forelse ($stocks as $stock)
                            <tr>
                                <td><b>{{ $stock->name }}</b></td>
                                <td>{{ $stock->medicine->name }}</td>
                                <td>{{ $stock->quantity }}</td>
                                <td>{{ $stock->stock }}</td>
                                <td>{{ $stock->purchase_price }}</td>
                                <td>{!! $stock->expires !!}</td>
                                <td>{{ $stock->created_at->diffForHumans() }}</td>
                                <td class="d-print-none text-end">
                                    <a href="{{ route('dashboard.stock.edit', $stock) }}"
                                        class="btn btn-icon btn-secondary">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.stock.destroy', $stock)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No stocks added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    </thead>
                </table>
            </div>
            {{ $stocks->links() }}
        </div>
    </section>
    <x-modal.confirm-delete />
</x-app-layout>

<x-app-layout title="Dashboard">
    <x-page-header title="Dashboard" />
    <div class="page-body">
        <div class="row row-cards mb-4">
            @foreach ($data as $item)
                <div class="col-md-6 col-xl-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="{{ $item['class'] }} avatar">
                                        <x-icon :name="$item['icon']" />
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ number_format($item['count']) }}
                                    </div>
                                    <div class="text-muted">
                                        {{ $item['title'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('dashboard.sales.form')
</x-app-layout>

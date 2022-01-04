<div class="card mb-4" x-data="findMedicine()">
    <div class="card-body">
        <h1 class="card-title text-center">Search for Medicine</h1>
        <form class="row g-2" @submit.prevent="search">
            <div class="col">
                <div class="input-icon">
                    <input type="text" x-model="query" class="form-control" placeholder="Search here.."
                        :disabled="loading" required>
                    <span class="input-icon-addon" x-show="loading">
                        <div class="spinner-border spinner-border-sm text-muted" role="status"></div>
                    </span>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary" :disabled="loading">
                    <x-icon name="search" /> Search
                </button>
            </div>
        </form>
    </div>

    <div x-html="result"></div>
</div>
@if (session()->has('cart'))
    @include('dashboard.sales.cart')
@endif
</div>

@push('head')
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endpush

@push('scripts')
    <script type="text/javascript">
        function findMedicine() {
            return {
                query: '',
                result: null,
                loading: false,
                endpoint: '{{ route('dashboard.search') }}',

                search() {
                    this.loading = true;
                    fetch(this.endpoint + '?q=' + this.query)
                        .then(res => res.text())
                        .then(data => {
                            this.result = data;
                            this.loading = false;
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },
            }
        }
    </script>
@endpush

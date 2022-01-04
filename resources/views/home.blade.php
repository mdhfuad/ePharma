<x-guest-layout title="Pharmacy Management System">
    <x-auth-card x-data="findMedicine">
        <section class="card-body">
            <h1 class="card-title text-center">Looking for Medicine?</h1>
            <form @submit.prevent="search" class="row g-2">
                <div class="col">
                    <div class="input-icon">
                        <input type="text" x-model="query" class="form-control" placeholder="Search here.." required
                            :disabled="loading">
                        <span class="input-icon-addon" x-show="loading">
                            <div class="spinner-border spinner-border-sm text-muted" role="status"></div>
                        </span>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" :disabled="loading">Search</button>
                </div>
            </form>
        </section>
        <div x-html="result"></div>
    </x-auth-card>

    <div class="text-center text-muted mt-3">
        <a href="{{ route('login') }}" tabindex="-1" class="btn btn-ghost-dark">Login</a>
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
                    endpoint: '{{ route('search') }}',

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

</x-guest-layout>

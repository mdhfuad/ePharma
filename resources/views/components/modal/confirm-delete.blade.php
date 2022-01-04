<div class="modal modal-blur fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <x-icon name="alert-triangle" class="icon icon-lg text-danger mb-2" />
                <h3>Are you sure?</h3>
                <div class="text-muted">
                    Do you really want to remove this item? What you've done cannot be undone.
                </div>
            </div>
            <form method="post" class="modal-footer">
                @method('DELETE')
                @csrf
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        (() => {
            document.querySelector('#confirm-delete').addEventListener('show.bs.modal', e => {
                const button = e.relatedTarget;
                const url = button.getAttribute('data-action');
                const form = document.querySelector('form.modal-footer');
                form.action = url;
            });
        })();
    </script>
@endpush

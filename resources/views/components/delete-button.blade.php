@props(['route'])

<button data-action="{{ $route }}" data-bs-toggle="modal" data-bs-target="#confirm-delete"
    class="btn btn-icon btn-danger">
    <x-icon name="trash" />
</button>

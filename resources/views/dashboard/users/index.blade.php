<x-app-layout title="Manage Users">
    <x-page-header title="Manage Users">
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-dark">
            <x-icon name="plus" /> Add User
        </a>
    </x-page-header>

    <section class="page-body">
        <x-flash-alert name="user" />

        <div class="card">
            <div class="card-header">Users</div>
            <div class="card-table table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td><strong>{{ $user->name }}</strong></td>
                                <td>{!! $user->htmlRole() !!}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.users.edit', $user) }}" class="btn btn-icon">
                                        <x-icon name="edit" />
                                    </a>
                                    <x-delete-button :route="route('dashboard.users.destroy', $user)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </section>

    <x-modal.confirm-delete />
</x-app-layout>

<x-app-layout title="Account Settings">
    <x-page-header title="Account Settings" />

    <section class="page-body">
        <x-flash-alert name="account" />

        <form action="{{ route('account.update') }}" method="post" class="card">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <x-form.input label="Name" name="name" type="text" :value="old('name', $user->name)" />
                </div>

                <div class="mb-4">
                    <x-form.input label="Email address" type="email" name="email" :value="old('email', $user->email)" />
                </div>

                <div class="mb-3">
                    <x-form.input label="Change Password" name="password" type="password" value="" />
                </div>

                <div class="mb-3">
                    <x-form.input label="Confirm New Password" name="password_confirmation" type="password" value="" />
                </div>

                <div class="form-footer text-end">
                    <button class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>

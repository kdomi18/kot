<x-guest-layout>
    <x-auth-card>
        <h1>Edit User {{ $user->name }}</h1>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('manager.users.update', $user->id) }}">
            @method('PATCH')
            @include('manager.users.partials.form')
        </form>
    </x-auth-card>
</x-guest-layout>

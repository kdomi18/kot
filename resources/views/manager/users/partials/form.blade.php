@csrf

<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')"/>

    <input id="name" class="block mt-1 w-full" type="text" name="name" @isset($user) value="{{$user->name}}@endisset"
           required
           autofocus/>
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')"/>

    <input id="email" class="block mt-1 w-full" type="email" name="email" @isset($user)value="{{$user->email}}@endisset"
           required/>
</div>

<!-- Password -->
@isset($create)
    <div class="mt-4">
        <x-label for="password" :value="__('Password')"/>

        <x-input id="password" class="block mt-1 w-full"
                 type="password"
                 name="password" required autocomplete="new-password"></x-input>
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>

        <x-input id="password_confirmation" class="block mt-1 w-full"
                 type="password"
                 name="password_confirmation" required></x-input>
    </div>
@endisset

<div class="mb-3">
    <x-label for="role" :value="__('Role')"></x-label>
    @foreach($roles as $role)
        <div class="form-check">
            <input type="checkbox" name="roles[]" class="form-check-input" value="{{ $role->id }}"
                   id="{{ $role->name }}"
                   @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label for="{{ $role->name }}" class="form-check-label">{{ $role->name }}</label>
        </div>
    @endforeach
</div>

<br>
<div class="flex items-center justify-end mt-4">

    <x-button class="ml-4">
        {{ __('Save') }}
    </x-button>
</div>

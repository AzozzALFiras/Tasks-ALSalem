<x-app-layout>
    <div class="jumbotron shade pt-5">

    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    {{-- @include('profile.partials.delete-user-form') --}}


        </div>
    </div>
</div>
</x-app-layout>

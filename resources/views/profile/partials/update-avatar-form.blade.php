<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Avatar
        </h2>
    </header>
    <img class="w-10 h-10 rounded-full" src="{{"/storage/$user->avatar"}}" alt="user avatar">
    <form action="{{ route('profile.avatar.ai') }}" method="post">
        @csrf
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Generate avatar
        </p>
        <x-primary-button class="mt-1">Generate</x-primary-button>
    </form>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Or
    </p>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        
        <div>
            <x-input-label for="avatar" value="avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

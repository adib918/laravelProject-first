<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
            Create new support ticket
        </h2>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{ route('ticket.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf

                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea placeholder="Add description..." id="description" name="description" />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                
                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input  name="attachment" id="attachment" />
                    <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
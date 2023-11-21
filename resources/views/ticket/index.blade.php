<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">
            Support tickets
        </h2>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            @forelse($tickets as $ticket)
                <div class="flex justify-between py-4">
                    <a href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->title }}</a>
                    <p>{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            @empty
            <div class="flex items-center justify-between">
                <p>There is no tickets yet...</p>
                <a href="{{ route('ticket.create') }}">
                    <x-primary-button>Create new</x-primary-button>
                </a>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
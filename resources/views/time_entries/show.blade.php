<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Time Entry Details for Task: ') }} {{ $task->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">{{ __('Start Time: ') }}{{ $timeEntry->start_time }}</h3>
                    <h3 class="text-2xl font-bold">{{ __('End Time: ') }}{{ $timeEntry->end_time }}</h3>
                    <p class="mt-4">{{ __('Duration: ') }}{{ $timeEntry->duration }} {{ __('minutes') }}</p>
                    <a href="{{ route('tasks.time_entries.index', $task) }}" class="text-blue-600 hover:text-blue-900 mt-4 inline-block">{{ __('Back to Time Entries') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

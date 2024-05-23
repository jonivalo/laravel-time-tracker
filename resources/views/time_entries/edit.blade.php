<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Time Entry for Task: ') }} {{ $task->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('tasks.time_entries.update', [$task, $timeEntry]) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="start_time" :value="__('Start Time')" />
                            <x-text-input id="start_time" class="block mt-1 w-full" type="datetime-local" name="start_time" value="{{ $timeEntry->start_time }}" required />
                            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="end_time" :value="__('End Time')" />
                            <x-text-input id="end_time" class="block mt-1 w-full" type="datetime-local" name="end_time" value="{{ $timeEntry->end_time }}" required />
                            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="duration" :value="__('Duration (minutes)')" />
                            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration" value="{{ $timeEntry->duration }}" required />
                            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
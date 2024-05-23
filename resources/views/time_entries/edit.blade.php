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
                    <form method="POST" action="{{ route('time_entries.update', $timeEntry) }}" onsubmit="calculateDuration(event)">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="task_id" :value="__('Task')" class="text-gray-900 dark:text-gray-200" />
                            <select name="task_id" id="task_id" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" {{ $task->id == $timeEntry->task_id ? 'selected' : '' }}>{{ $task->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="start_time" :value="__('Start Time')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="start_time" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="datetime-local" name="start_time" value="{{ $timeEntry->start_time }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="end_time" :value="__('End Time')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="end_time" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="datetime-local" name="end_time" value="{{ $timeEntry->end_time }}" required />
                        </div>

                        <x-primary-button>{{ __('Update Time Entry') }}</x-primary-button>
                        <input type="hidden" name="duration" id="duration">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateDuration(event) {
            event.preventDefault();
            const startTime = new Date(document.getElementById('start_time').value);
            const endTime = new Date(document.getElementById('end_time').value);
            const durationInput = document.getElementById('duration');

            if (startTime && endTime) {
                const duration = Math.round((endTime - startTime) / 60000);
                durationInput.value = duration;
            }

            event.target.submit();
        }
    </script>
</x-app-layout>


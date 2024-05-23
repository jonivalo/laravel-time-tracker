<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Time Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('time_entries.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Create Time Entry') }}
                    </a>
                    <table class="min-w-full leading-normal mt-4 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('Project') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('Task') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('Start Time') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('End Time') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('Duration (minutes)') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-300 dark:bg-gray-800 text-left text-xs font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeEntries as $timeEntry)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        {{ $timeEntry->task->project->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        {{ $timeEntry->task->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        {{ $timeEntry->start_time }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        {{ $timeEntry->end_time }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        {{ $timeEntry->duration }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-sm">
                                        <a href="{{ route('time_entries.show', $timeEntry) }}" class="text-blue-600 hover:text-blue-800">{{ __('View') }}</a>
                                        <a href="{{ route('time_entries.edit', $timeEntry) }}" class="text-blue-600 hover:text-blue-800 ml-4">{{ __('Edit') }}</a>
                                        <form action="{{ route('time_entries.destroy', $timeEntry) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-4">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

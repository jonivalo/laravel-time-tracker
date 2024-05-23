<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Users') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @foreach($users as $user)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $user->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                            <h5 class="mt-4 font-bold text-gray-800 dark:text-gray-200">{{ __('Projects') }}</h5>
                            <ul>
                                @foreach($user->projects as $project)
                                    <li class="mt-2">
                                        <span class="font-semibold">{{ $project->name }}</span>
                                        <ul>
                                            @foreach($project->tasks as $task)
                                                <li class="ml-4">
                                                    <span>{{ $task->name }}</span>
                                                    <ul>
                                                        @foreach($task->timeEntries as $entry)
                                                            <li class="ml-4">
                                                                <span>{{ $entry->start_time }} - {{ $entry->end_time }} ({{ $entry->duration }} mins)</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

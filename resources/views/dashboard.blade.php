<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <!-- Projects Section -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Projects') }}</h3>
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Create Project') }}
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($projects as $project)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $project->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $project->description }}</p>
                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 mr-4">{{ __('View') }}</a>
                                <a href="{{ route('projects.edit', $project) }}" class="text-blue-600 hover:text-blue-800 mr-4">{{ __('Edit') }}</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tasks Section -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Recent Tasks') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @foreach($tasks as $task)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $task->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $task->description }}</p>
                            <a href="{{ route('projects.tasks.show', [$task->project, $task]) }}" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">{{ __('View Task') }}</a>
                        </div>
                    @endforeach
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mt-6">{{ __('Create New Task') }}</h3>
                @if($projects->isNotEmpty())
                    <form action="{{ route('projects.tasks.store', ['project' => $projects->first()->id]) }}" method="POST" class="mt-4 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="task_project" :value="__('Project')" class="text-gray-900 dark:text-gray-200" />
                            <select name="project_id" id="task_project" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="task_name" :value="__('Task Name')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="task_name" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="text" name="name" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="task_description" :value="__('Task Description')" class="text-gray-900 dark:text-gray-200" />
                            <x-textarea id="task_description" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" name="description"></x-textarea>
                        </div>
                        <x-primary-button>{{ __('Create Task') }}</x-primary-button>
                    </form>
                @else
                    <p class="text-gray-600 dark:text-gray-400">{{ __('No projects available to create tasks.') }}</p>
                @endif
            </div>

            <!-- Time Entries Section -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Recent Time Entries') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @foreach($timeEntries as $timeEntry)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ __('Task: ') }}{{ $timeEntry->task->name }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('Duration: ') }}{{ $timeEntry->duration }}{{ __(' minutes') }}</p>
                            <a href="{{ route('tasks.time_entries.show', [$timeEntry->task, $timeEntry]) }}" class="text-blue-600 hover:text-blue-800 mt-4 inline-block">{{ __('View Entry') }}</a>
                        </div>
                    @endforeach
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mt-6">{{ __('Log Time Entry') }}</h3>
                @if($tasks->isNotEmpty())
                    <form action="{{ route('tasks.time_entries.store', ['task' => $tasks->first()->id]) }}" method="POST" class="mt-4 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="task_time_entry" :value="__('Task')" class="text-gray-900 dark:text-gray-200" />
                            <select name="task_id" id="task_time_entry" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="start_time" :value="__('Start Time')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="start_time" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="datetime-local" name="start_time" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="end_time" :value="__('End Time')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="end_time" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="datetime-local" name="end_time" required />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="duration" :value="__('Duration (in minutes)')" class="text-gray-900 dark:text-gray-200" />
                            <x-text-input id="duration" class="block mt-1 w-full bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-200" type="number" name="duration" required />
                        </div>
                        <x-primary-button>{{ __('Log Time Entry') }}</x-primary-button>
                    </form>
                @else
                    <p class="text-gray-600 dark:text-gray-400">{{ __('No tasks available to log time entries.') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

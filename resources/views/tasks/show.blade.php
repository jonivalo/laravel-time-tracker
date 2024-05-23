<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Details for Project: ') }} {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">{{ $task->name }}</h3>
                    <p class="mt-4">{{ $task->description }}</p>
                    <a href="{{ route('projects.tasks.index', $project) }}" class="text-blue-600 hover:text-blue-900 mt-4 inline-block">{{ __('Back to Tasks') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

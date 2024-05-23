<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold">{{ $project->name }}</h3>
                    <p class="mt-4">{{ $project->description }}</p>
                    <a href="{{ route('projects.index') }}" class="text-blue-400 hover:text-blue-600 mt-4 inline-block">{{ __('Back to Projects') }}</a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold">{{ __('Tasks for Project: ') }} {{ $project->name }}</h3>
                    <table class="min-w-full leading-normal mt-4">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Description') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->tasks as $task)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-gray-600 text-sm text-gray-200">
                                        {{ $task->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-gray-600 text-sm text-gray-200">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-300 bg-gray-600 text-sm">
                                        <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="text-blue-400 hover:text-blue-600">{{ __('View') }}</a>
                                        <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="text-blue-400 hover:text-blue-600 ml-4">{{ __('Edit') }}</a>
                                        <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-4">{{ __('Delete') }}</button>
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

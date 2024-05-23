<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks for Project: ') }} <span class="text-blue-500">{{ $project->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('projects.tasks.create', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Create Task') }}
                    </a>
                    <table class="min-w-full leading-normal mt-4">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Description') }}
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-gray-700 text-sm text-gray-200">
                                        {{ $task->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-gray-700 text-sm text-gray-200">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-gray-700 text-sm">
                                        <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="text-blue-400 hover:text-blue-600">{{ __('View') }}</a>
                                        <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="text-blue-400 hover:text-blue-600 ml-4">{{ __('Edit') }}</a>
                                        <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600 ml-4">{{ __('Delete') }}</button>
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

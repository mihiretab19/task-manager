<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold mb-6">
                TaskFlow Dashboard
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-gray-500">Total Tasks</h2>
                    <p class="text-3xl font-bold">
                        {{ auth()->user()->tasks()->count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-gray-500">Pending</h2>
                    <p class="text-3xl font-bold">
                        {{ auth()->user()->tasks()->where('status', 'Pending')->count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-gray-500">In Progress</h2>
                    <p class="text-3xl font-bold">
                        {{ auth()->user()->tasks()->where('status', 'In Progress')->count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-gray-500">Completed</h2>
                    <p class="text-3xl font-bold">
                        {{ auth()->user()->tasks()->where('status', 'Completed')->count() }}
                    </p>
                </div>

            </div>

            <div class="mt-8">
                <a
                    href="{{ route('tasks.index') }}"
                    class="bg-gray-800 text-white px-5 py-3 rounded"
                >
                    View My Tasks
                </a>

                <a
                    href="{{ route('tasks.create') }}"
                    class="ml-3 bg-blue-600 text-white px-5 py-3 rounded"
                >
                    Create Task
                </a>
            </div>

        </div>
    </div>

</x-app-layout>
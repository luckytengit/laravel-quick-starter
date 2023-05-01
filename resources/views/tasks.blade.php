<x-layouts.task>

    <!-- Bootstrap Boilerplate... -->
    <div class="sm:max-w-4xl items-center justify-between mt-1">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="./task" method="POST" class="w-full flex items-center justify-between mt-1">
            @csrf

            <!-- Task Name -->
            <div class="form-group w-full">
                <label for="task-name" class="m-3 control-label">[Task]</label>

                <div>
                    <input type="text" name="name" id="task-name" class="block mt-1 w-full">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="mt-6">
                    <x-primary-button class="ml-3" type="submit">
                        <i class="fa fa-plus"></i> Add Task
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <!-- TODO: Current Tasks -->
    [Current Tasks]
    @if (isset($tasks) && count($tasks) > 0)
        <div class="justify-between mt-1">
            <div class="panel-body">
                <table class="w-full table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th class="w-96">tasks</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="items-center border">
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td class="text-right">
                                    <form action="./task/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <x-primary-button class="ml-3">Delete Task</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
            </div>
        </div>
    @endif

</x-layouts.task>
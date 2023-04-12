@extends('app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <div class="flex items-center justify-between mt-1">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="./task" method="POST" class="flex items-center justify-between mt-1">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="m-3 control-label">[Task]</label>

                <div class="m-3">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 mt-6">
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
        <div class="flex justify-between h-1">
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>tasks</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="nline-flex items-center px-3 py-2 border">
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="./task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <x-primary-button class="ml-3">Delete Task</x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
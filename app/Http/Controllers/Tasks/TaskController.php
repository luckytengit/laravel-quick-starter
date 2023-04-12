<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\TaskRepository;
use App\Models\Tasks\Task;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        //Debugbar::enable();

        if (!empty($request->user())) {
            return view('tasks', [
                'tasks' => $this->tasks->forUser($request->user())
            ]);
        } else {
            return view('tasks');
        }
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        // Create The Task...
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  string  $taskId
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        // 정책
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
        
    }

}

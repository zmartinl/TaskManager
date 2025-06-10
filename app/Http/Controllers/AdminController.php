<?php

/**
 * Controller for admin panel tasks management.
 * 
 * @category TaskManager
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\User;
use App\Models\Priorities;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

/**
 * AdminController handles the task management for the admin panel.
 * 
 * @category TaskManager
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class AdminController extends Controller
{
    /**
     * Show the admin panel.
     * 
     * @return View
     */
    public static function index(): View
    {
        return view('adminPanel.adminView');
    }

    /**
     * Show the task creation form.
     * 
     * @return View
     */
    public static function create(): View
    {
        return view('adminPanel.createTaskView')
            ->with('users', User::allUsers())
            ->with('priorities', Priorities::allPriorities());
    }

    /**
     * Create a new task.
     * 
     * @param Request $request The HTTP request containing task data
     * 
     * @return RedirectResponse
     */
    public function createTask(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name'        => 'required|string|max:100',
                'description' => 'nullable|string|max:255',
                'user'        => 'required',
                'priority'    => 'required',
                'date'        => 'required|date',
            ]
        );

        $task = Tasks::createTask(
            $request->only(['name', 'description', 'user', 'priority', 'date'])
        );

        if (!$task) {
            return redirect()->back()
                ->withErrors(['error' => 'Error al crear la tarea'])
                ->withInput();
        }

        return redirect()->route('createTask')
            ->with(['success' => 'Tarea creada correctamente'])
            ->withInput();
    }

    /**
     * Show the task editing menu.
     * 
     * @return View
     */
    public static function menuEdit(): View
    {
        return view('adminPanel.menuEditTaskView')
            ->with('tasks', Tasks::infoTask());
    }

    /**
     * Show the task editing form.
     * 
     * @param int $id Task ID
     * 
     * @return View
     */
    public static function editTask(int $id): View
    {
        return view('adminPanel.editTaskView')
            ->with('task', Tasks::infoTaskEditing($id))
            ->with('users', User::all())
            ->with('priorities', Priorities::all());
    }

    /**
     * Process task editing.
     * 
     * @param Request $request The HTTP request containing task data
     * 
     * @return View
     */
    public function taskEdited(Request $request): View
    {
        $request->validate(
            [
                'task_id'     => 'required|integer',
                'description' => 'nullable|string|max:255',
                'priority'    => 'required',
                'user'        => 'required',
                'date'        => 'required|date',
            ]
        );

        $task = Tasks::searchTask($request->task_id);
        
        $data = array_filter(
            [
                'description' => $request->description !== $task->description
                    ? $request->description : null,
                'priority_id' => $request->priority !== $task->priority_id
                    ? $request->priority : null,
                'user_id'     => $request->user !== $task->user_id
                    ? $request->user : null,
                'deadline'    => $request->date !== $task->deadline
                    ? $request->date : null,
            ]
        );

        if (!empty($data)) {
            Tasks::editingTask($data, $request->task_id);
            return view('adminPanel.adminView')
                ->with(['success' => 'Tarea editada correctamente']);
        }

        return view('adminPanel.adminView')
            ->with(['error' => 'No se ha editado la tarea']);
    }

    /**
     * Delete a task.
     * 
     * @param int $id Task ID
     * 
     * @return View
     */
    public static function deletingTask(int $id): View
    {
        Tasks::deleteTask($id);
        return self::menuEdit();
    }
}

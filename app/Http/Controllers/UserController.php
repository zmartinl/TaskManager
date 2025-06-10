<?php

/**
 * Controller for handling user-related actions in the user panel.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Tasks;

/**
 * UserController handles user-specific actions in the user panel such as 
 * viewing tasks, 
 * starting tasks, and completing tasks.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class UserController extends Controller
{
    /**
     * Display the user panel view.
     * 
     * @return View
     */
    public static function index(): View
    {
        return view('userPanel.userView');
    }

    /**
     * Get and display the user's tasks.
     * 
     * @return View
     */
    public static function getTasks()
    {
        return view('userPanel.userView')
            ->with('tasks', Tasks::infoTask());
    }

    /**
     * Mark a task as completed.
     * 
     * @param int $id Task ID
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function completeTask(int $id): Mixed
    {
        $task = Tasks::find($id);

        if (!$task) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error al completar la tarea']);
        }

        $task->status_id = 1;
        $task->end_date = date('Y-m-d');
        $task->save();

        return redirect()->route('userPanel');
    }

    /**
     * Start a task.
     * 
     * @param int $id Task ID
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function startTask(int $id): Mixed
    {
        $task = Tasks::find($id);

        if (!$task) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error al iniciar la tarea']);
        }

        $task->status_id = 2;
        $task->start_date = date('Y-m-d');
        $task->save();

        return redirect()->route('userPanel');
    }
}

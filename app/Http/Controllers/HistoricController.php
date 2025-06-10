<?php

/**
 * Controller for handling historic data and displaying task history.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Tasks;

/**
 * HistoricController manages the retrieval and display of task history.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class HistoricController extends Controller
{
    /**
     * Display the historic task view with a list of tasks.
     * 
     * @return View
     */
    public static function index(): View
    {
        $tasks = Tasks::infoTask();
        return view('historic.historicView')->with('tasks', $tasks);
    }
}

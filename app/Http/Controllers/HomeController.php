<?php

/**
 * Controller for handling the home page view.
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

/**
 * HomeController handles the display of the home page.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class HomeController extends Controller
{
    /**
     * Display the home page view.
     * 
     * @return View
     */
    public function index(): View
    {
        return view('home.homeView');
    }
}

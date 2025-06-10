<?php
/**
 * Base controller class for handling common controller functionality.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * The Controller class serves as the base controller for the application, 
 * providing shared logic across all controllers.
 * 
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

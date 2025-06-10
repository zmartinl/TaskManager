<?php

/**
 * Model for interacting with the priorities table in the database.
 * 
 * @category Models
 * @package  App\Models
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * The Priorities model represents the priorities table in the database.
 * It provides methods to interact with priority data.
 * 
 * @category Models
 * @package  App\Models
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class Priorities extends Model
{
    protected $table = 'priorities';
    
    /**
     * Retrieve all priorities from the database.
     * 
     * @return Collection
     */
    public static function allPriorities(): Collection
    {
        return self::all();
    }
}

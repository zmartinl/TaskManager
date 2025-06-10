<?php

/**
 * Model for interacting with the tasks table in the database.
 * 
 * @category Models
 * @package  App\Models
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * The Tasks model represents the tasks table in the database.
 * It provides methods to retrieve, create, edit, and delete tasks.
 * 
 * @category Models
 * @package  App\Models
 * @author   Zeus <zmartinllera1@gmail.com>
 * @license  MIT License
 * @link     No domain specified
 */
class Tasks extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'name', 'description', 'user_id', 'priority_id', 'deadline'
    ];

    /**
     * Retrieve all tasks with user and priority information.
     * 
     * @return Collection
     */
    public static function infoTask(): Collection
    {
        return self::select(
            'tasks.*',
            'users.name as user_name',
            'priorities.name as priority_name'
            )
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->get()
            ->groupBy('user_name');
    }

    /**
     * Retrieve a specific task for editing with user and priority information.
     * 
     * @param int $id Task ID
     * 
     * @return Model
     */
    public static function infoTaskEditing(int $id): Model
    {
        return self::select('tasks.*', 'users.name as user_name', 'priorities.name as priority_name')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('priorities', 'tasks.priority_id', '=', 'priorities.id')
            ->where('tasks.id', $id)
            ->first();
    }

    /**
     * Create a new task.
     * 
     * @param array $data Task data
     * 
     * @return Model
     */
    public static function createTask($data): Model
    {
        return self::create(
            [
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['user'],
            'priority_id' => $data['priority'],
            'deadline' => $data['date'],
            ]
        );
    }

    /**
     * Update an existing task with new data.
     * 
     * @param array $data Task data
     * @param int   $id   Task ID
     * 
     * @return bool
     */
    public static function editingTask(array $data, int $id): bool
    {
        return self::where('id', $id)
            ->update($data);
    }

    /**
     * Delete a task.
     * 
     * @param int $id Task ID
     * 
     * @return bool
     */
    public static function deleteTask(int $id): bool
    {
        return self::destroy($id);
    }

    /**
     * Find a task by its ID.
     * 
     * @param int $id Task ID
     * 
     * @return Model
     */
    public static function searchTask(int $id): Model
    {
        return self::find($id);
    }
}

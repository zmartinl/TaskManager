<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class User extends Model
{
    protected $table = 'users';

    public static function allUsers(): Collection {
        return self::all();
    }
}

<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
class UserRepository implements UserRepositoryInterface{
    public function getUserById($id)
    {
        return User::find($id);
    }

    public function getUserWithProfileById($id)
    {
        return User::with('profile')->find($id); 
    }
}

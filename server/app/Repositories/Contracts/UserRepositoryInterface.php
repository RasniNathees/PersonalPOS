<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getUserById($id);
    public function getUserWithProfileById($id);
}
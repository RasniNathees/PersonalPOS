<?php

namespace App\Services;

use App\Services\Contracts\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUserDataWithProfile($userId)
    {
        $user = $this->userRepository->getUserWithProfileById($userId);
        $userData = [
            'firstName' => $user->profile->firstName,
            'lastName' => $user->profile->lastName,
            'email' => $user->email,
            'avatarUrl' => $user->profile->avatarUrl
        ];
        return   $userData;

    }
}
<?php

namespace  App\Repositories\Contracts;
/**
 * Summary of UserProfileRepositoryInterface
 */
interface UserProfileRepositoryInterface{
    public function getProfileByUserId($userId);
}
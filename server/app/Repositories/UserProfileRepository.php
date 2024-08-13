<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Models\UserProfile;
class UserProfileRepository implements UserProfileRepositoryInterface{
   
    public function getProfileByUserId($userId){

        return UserProfile::where('user_id',$userId)->first();
    }
}

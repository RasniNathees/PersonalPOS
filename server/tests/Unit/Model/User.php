<?php

use App\Models\User;
use App\Models\UserProfile;


it('test relationship with user and profile',function(){
$user = User::factory()->create();
$profile = UserProfile::factory()->create([
    'user_id'=>$user->id,
    'firstName' => 'Rasni',
    'lastName' => 'Nathees',
]);
expect($profile->user->id)->toBe($user->id);

expect('user_profiles')->toHaveDatabaseRecord([
    'user_id' => $user->id,
    'firstName' => 'Rasni',
    'lastName' => 'Nathees',
]);
});
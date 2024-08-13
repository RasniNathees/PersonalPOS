<?php

use App\Models\User;
use App\Models\UserProfile;
use App\Services\UserService;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

uses(RefreshDatabase::class);

beforeEach(function () {
// Mock the UserRepositoryInterface
/** @var UserRepositoryInterface */
$this->userRepository = Mockery::mock(UserRepositoryInterface::class);

// Create UserService with the mocked repository
$this->userService = new UserService($this->userRepository);
});

afterEach(function () {
// Close Mockery to clear any mocks
Mockery::close();
});

it('can get user data with profile', function () {
// Setup
$userId = 1;

// Mock UserProfile
$profile = Mockery::mock(UserProfile::class);
$profile->shouldReceive('getAttribute')
->with('firstName')
->andReturn('Rasni');
$profile->shouldReceive('getAttribute')
->with('lastName')
->andReturn('Nathees');
$profile->shouldReceive('getAttribute')
->with('avatarUrl')
->andReturn('img/image.png');
// Mock User
$user = Mockery::mock(User::class);
$user->shouldReceive('getAttribute')
->with('email')
->andReturn('rasni@example.com');
$user->shouldReceive('profile')
->andReturn($profile);

// Set up expectation for the UserRepository mock
$this->userRepository->shouldReceive('getUserWithProfileById')
->with($userId)
->andReturn($user);

// Act
$result = $this->userService->getUserDataWithProfile($userId);

// Assert
expect($result['firstName'])->toEqual('Rasni');
expect($result['lastName'])->toEqual('nathees');
expect($result['email'])->toEqual('rasni@example.com');
expect($result['avatarUrl'])->toEqual('img/image.png'); // Assuming avatarUrl uses firstName
});

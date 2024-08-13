<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            
            'firstName'=>fake()->name(),
            'lastName'=>fake()->name(),
            'avatarUrl'=>UploadedFile::fake()->image('logo.png'),
            'user_id'=>User::factory()->create([
                'email' => 'rasni@admin.com',
            ]),
            
        ];
    }
}

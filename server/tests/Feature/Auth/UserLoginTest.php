<?php
use Laravel\Passport\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('Session has errors when submit empty form', function () {
   



    $client = Client::factory()->create([
        'redirect' => 'http://localhost',
        'personal_access_client' => false,
        'password_client' => true,
        'revoked' => false,
    ]);

    $data = [
        'grant_type' => 'password',
        'client_id' => $client->id, // Use id instead of name
        'client_secret' => $client->secret,
        'username' =>'' ,
        'password' =>'',
        'scope' => '*',
    ];

    $this->post('/api/oauth/token', $data)
       ->assertSessionHasErrors(['username','password']);




});

it('can successfully get token', function () {
    $user = User::factory()->create([
        'password' => Hash::make('test-password'),
    ]);



    $client = Client::factory()->create([
        'redirect' => 'http://localhost',
        'personal_access_client' => false,
        'password_client' => true,
        'revoked' => false,
    ]);

    $data = [
        'grant_type' => 'password',
        'client_id' => $client->id, // Use id instead of name
        'client_secret' => $client->secret,
        'username' => $user->email,
        'password' => 'test-password',
        'scope' => '*',
    ];

    $this->post('/api/oauth/token', $data)
        ->assertStatus(200)
        ->assertCookie('refresh_token')
        ->assertCookie('access_token')
        ->assertJsonStructure([
            'token_type',
            'expires_in',
            'access_token',
        ]);




});

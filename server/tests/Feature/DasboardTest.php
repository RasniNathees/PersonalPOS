<?php



use App\Models\User;
use App\Models\UserProfile;
use Laravel\Passport\Client;


it('returns user data and profile when visiting the dashboard', function () {

    $user = User::factory()->create([
        'password'=>'test-password'
    ]);
    $profile = UserProfile::factory()->create([
        'user_id' => $user->id
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

 $response =    $this->post('/api/oauth/token', $data);


    $token =  $response['access_token'];
    $this->withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->get('/api/dashboard')
        ->assertStatus(200)
        ->assertJsonStructure([
            'firstName',
            'lastName',
            'email' ,
            'avatarUrl' 
        ]);
});

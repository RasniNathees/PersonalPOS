<?php

use App\Http\Controllers\Auth\CheckAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateAuthLoginRequest;
use App\Http\Middleware\HandleToken;
use App\Http\Middleware\TokenFromCookie;

Route::group([
    'as' => 'passport.',
    'prefix' => config('passport.path', 'oauth'),
    'namespace' => '\Laravel\Passport\Http\Controllers',
], function () {
    // Passport routes...
    Route::post('/token', [
        'uses' => 'AccessTokenController@issueToken',
        'as' => 'token',
        'middleware' => 'throttle',
    ])->middleware(ValidateAuthLoginRequest::class,HandleToken::class);
});
Route::get('/checkAuth',[CheckAuthController::class,'checkAuth'])->middleware(TokenFromCookie::class,'auth:api');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(TokenFromCookie::class,'auth:api');
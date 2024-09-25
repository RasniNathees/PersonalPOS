<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class CheckAuthController extends Controller
{
    //
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function checkAuth(){
        $user = Auth::user();

        $userData = $this->userService->getUserDataWithProfile($user->id);

        return response()->json($userData, 200);
    }
}

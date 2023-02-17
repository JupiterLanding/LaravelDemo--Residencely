<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function updateUser(UpdateUserRequest $request, UserService $userService)
    {
        $user = $userService->updateUser($request);

        return redirect()->route("users.profile")->with("user", $user);
    }


    public function profile()
    {
        return view("profile");
    }

    public function messages()
    {
        return view("users.messages");
    }

    public function vouchers()
    {
        return view("users.vouchers");
    }
}

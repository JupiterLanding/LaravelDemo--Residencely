<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function updateUser(UpdateUserRequest $request)
    {
        $user = auth()->user();
        $user->company = $request->get("company");
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->save();

        return $user;
    }
}

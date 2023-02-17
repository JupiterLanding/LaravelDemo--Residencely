<?php

namespace App\Services;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserService
{
    public function createVoucher(User $user)
    {
        return Voucher::create([
            "code" => Str::upper(Str::random(8)),
            "discount_percent" => 35,
            "user_id" => $user->id,
        ]);
    }

    public function updateUser(Request $request)
    {
        $user = auth()->user();
        $user->company = $request->get("company");
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->save();

        return $user;
    }
}

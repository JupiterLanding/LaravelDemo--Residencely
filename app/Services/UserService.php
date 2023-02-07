<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Voucher;

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
}

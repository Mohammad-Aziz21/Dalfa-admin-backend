<?php

namespace App\Http\Controllers\UserPassword;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function __invoke(User $user)
    {
        return view('userPassword.edit')->with('user', $user);
    }
}

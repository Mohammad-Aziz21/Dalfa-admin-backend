<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.edit')->with('user', $user);
    }
}

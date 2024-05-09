<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke()
    {
        return view('user.index')->with('users', User::with('detail')->where('role_id', 2)->get());
    }
}

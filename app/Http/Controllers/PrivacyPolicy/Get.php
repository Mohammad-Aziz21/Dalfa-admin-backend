<?php

namespace App\Http\Controllers\PrivacyPolicy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Get extends Controller
{
    public function __invoke()
    {
        return view('privacyPolicy.index');
    }
}

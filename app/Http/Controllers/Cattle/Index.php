<?php

namespace App\Http\Controllers\Cattle;

use App\Http\Controllers\Controller;
use App\Models\Cattle\Cattle;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke()
    {
        return view('cattle.index')->with('cattle', Cattle::with('user.detail')->get());
    }
}

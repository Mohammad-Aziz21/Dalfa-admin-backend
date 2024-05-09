<?php

namespace App\Http\Controllers\Cattle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function __invoke()
    {
        return view('cattle.create');
    }
}

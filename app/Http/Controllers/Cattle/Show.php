<?php

namespace App\Http\Controllers\Cattle;

use App\Http\Controllers\Controller;
use App\Models\Cattle\Cattle;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __invoke(Cattle $cattle)
    {
        return view('cattle.show')->with('cattle', $cattle);
    }
}

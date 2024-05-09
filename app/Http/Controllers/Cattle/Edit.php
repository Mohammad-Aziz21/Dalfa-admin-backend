<?php

namespace App\Http\Controllers\Cattle;

use App\Http\Controllers\Controller;
use App\Models\Cattle\Cattle;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function __invoke($cattle)
    {
        return view('cattle.edit')
            ->with('cattle', Cattle::with('images')
                                   ->with('videos')
                                   ->where('id', $cattle)
                                   ->first()
            );
    }
}

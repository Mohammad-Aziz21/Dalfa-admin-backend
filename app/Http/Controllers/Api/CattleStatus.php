<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cattle\Cattle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CattleStatus extends Controller
{
    public function __invoke(Cattle $cattle)
    {
        $cattle->is_approved = !$cattle->is_approved;
        $cattle->save();

        // Set flash message based on activation status
        if ($cattle->is_approved) {
            Session::flash('alert-class', 'alert-success');
            Session::flash('message', 'Cattle approved successfully');
        } else {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Cattle unapproved successfully');
        }

        return back();
    }
}

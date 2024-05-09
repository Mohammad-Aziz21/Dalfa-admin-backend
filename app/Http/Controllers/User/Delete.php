<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __invoke(User $user)
    {
        $user->detail->delete();

        foreach ($user->cattle as $cattle){
//            dd($cattle->images);
            $cattle->images->each->delete();
            $cattle->videos->each->delete();
            $cattle->delete();
        }

        $user->delete();
        \Session::flash('message', 'Successfully Deleted');
        \Session::flash('alert-class', 'alert-danger');

        return redirect()->route('coc.index');
    }
}

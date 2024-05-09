<?php

    namespace App\Http\Controllers\Logout;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class Logout extends Controller
    {
        public function __invoke()
        {
            \Session::flush();
            Auth::logout();

            return redirect()->route('login.get');
        }
    }

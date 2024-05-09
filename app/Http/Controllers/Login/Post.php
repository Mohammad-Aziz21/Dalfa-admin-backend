<?php

    namespace App\Http\Controllers\Login;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;

    class Post extends Controller
    {
        public function __invoke(Request $request)
        {
            $credentials = $request->only('email', 'password');
            $auth        = Auth::attempt($credentials);
            /*
             * Checking the AUTH ATTEMPT IS TRUE
             * */

            if ($auth) {
                return redirect()->route('coc.index');
            } else {
                Session::flash('message', __('auth.failed'));
                return Redirect::back();
            }
        }
    }

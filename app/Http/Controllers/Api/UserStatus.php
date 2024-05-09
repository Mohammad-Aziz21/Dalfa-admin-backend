<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\User\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class UserStatus extends Controller
    {
        public function __invoke(User $user)
        {
            $user->is_active = !$user->is_active;
            $user->save();

            // Set flash message based on activation status
            if ($user->is_active) {
                Session::flash('alert-class', 'alert-success');
                Session::flash('message', 'User activated successfully');
            } else {
                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', 'User deactivated successfully');
            }
            return back();
        }
    }

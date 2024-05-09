<?php

    namespace App\Http\Controllers\UserPassword;

    use App\Domain\Repositories\Service\PasswordReset\PasswordReset;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\UserPasswordResetRequest;
    use App\Models\User\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class Update extends Controller
    {
        public function __invoke(UserPasswordResetRequest $request, User $user)
        {
            $validated = $request->validated();

            $response = (new PasswordReset(
                $user->username ?? '',
                $validated['password'] ?? '',
                $validated['password'] ?? ''
            ))->request();

            if ($response == null) {
                Session::flash('message', 'Connectivity issue');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            } elseif ($response->code != 200) {
                \Log::info(json_encode($response));
                Session::flash('message', $response->message);
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            } elseif ($response->code == 200) {
                \Log::info(json_encode($response));
                Session::flash('message', $response->data->message);
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }

            Session::flash('message', 'Something went wrong - 1000');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

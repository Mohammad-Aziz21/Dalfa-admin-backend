<?php

    namespace App\Http\Controllers\User;

    use App\Domain\Repositories\Service\Registration\UserRegistration;
    use App\Domain\Repositories\Service\S3\s3;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\UserStoreRequest;
    use Illuminate\Support\Facades\Session;

    class Store extends Controller
    {
        public function __invoke(UserStoreRequest $request)
        {
            $validated = $request->validated();

            if (isset($validated['image_url'])){
                $file = $request->file('image_url');
                $filename = 'temp'.$file->extension();

                $route = $file->move(public_path('temp'), $filename);
                $image_url = (
                    new s3(
                        $route->getPathname() ?? ''
                    )
                )->request();
                \File::delete(public_path('temp/' . $route->getFilename()));

                if ($image_url == null) {
                    Session::flash('message', 'Connectivity issue');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect()->back();
                }
            }

            if (isset($validated['farm_logo_url'])){
                $file = $request->file('farm_logo_url');
                $filename = 'temp'.$file->extension();

                $route = $file->move(public_path('temp'), $filename);
                $farm_logo_url = (
                    new s3(
                        $route->getPathname() ?? ''
                    )
                )->request();
                \File::delete(public_path('temp/' . $route->getFilename()));

                if ($farm_logo_url == null) {
                    Session::flash('message', 'Connectivity issue');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect()->back();
                }
            }

            /**
             * Api call
             */
            $response = (new UserRegistration(
                $validated['role_id'] ?? '',
                $image_url->data->url ?? '',
                $validated['first_name'] ?? '',
                $validated['last_name'] ?? '',
                $validated['gender'] ?? '',
                $validated['username'] ?? '',
                $validated['email'] ?? '',
                $validated['password'] ?? '',
                $validated['password'] ?? '',
                $validated['farm_title'] ?? '',
                $validated['address'] ?? '',
                $validated['description'] ?? '',
                $validated['phone'] ?? '',
                $farm_logo_url->data->url ?? '',
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
                Session::flash('message', $response->message);
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }

            Session::flash('message', 'Something went wrong - 1000');
            Session::flash('alert-class', 'alert-danger');
            return back();

        }
    }

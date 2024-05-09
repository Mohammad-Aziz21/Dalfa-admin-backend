<?php

    namespace App\Http\Controllers\User;

    use App\Domain\Repositories\Service\S3\s3;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\UserEditRequest;
    use App\Models\User\User;
    use App\Models\User\UserDetail;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;

    class Update extends Controller
    {
        public function __invoke(UserEditRequest $request, User $user)
        {
            $validated = $request->validated();
            DB::beginTransaction();

            try {

                if (isset($validated['image_url'])) {
                    $file     = $request->file('image_url');
                    $filename = 'temp' . $file->extension();

                    $route     = $file->move(public_path('temp'), $filename);
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
                    } else {
                        $user->image_url = $image_url->data->url;
                    }
                }

                $user->email      = $validated['email'];
                $user->username   = $validated['username'];
                $user->first_name = $validated['first_name'];
                $user->last_name  = $validated['last_name'];
                $user->is_active  = $validated['is_active'];
                $user->gender     = $validated['gender'];

                $user->save();

                $detail = UserDetail::find($user->detail->id);

                if (isset($validated['farm_logo_url'])) {
                    $file     = $request->file('farm_logo_url');
                    $filename = 'temp' . $file->extension();

                    $route         = $file->move(public_path('temp'), $filename);
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
                    } else {
                        $detail->farm_logo_url = $farm_logo_url->data->url;
                    }
                }

                $detail->farm_title    = $validated['farm_title'];
                $detail->address       = $validated['address'];
                $detail->description   = $validated['description'];
                $detail->phone         = $validated['phone'];

                $detail->save();
            }
            catch (\Exception $e) {
                \Log::info($e);
                DB::rollback();
                Session::flash('message', 'Something Went Wrong!');
                Session::flash('alert-class', 'alert-danger');

                return redirect()->back();
            }

            DB::commit();
            Session::flash('message', 'Successfully Updated');
            Session::flash('alert-class', 'alert-success');

            return redirect()->back();
        }
    }

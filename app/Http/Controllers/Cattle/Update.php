<?php

    namespace App\Http\Controllers\Cattle;

    use App\Domain\Repositories\Service\S3\s3;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\CattleEditRequest;
    use App\Models\Cattle\Cattle;
    use App\Models\Cattle\CattleImage;
    use App\Models\Cattle\CattleVideos;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;

    class Update extends Controller
    {
        public function __invoke(CattleEditRequest $request, Cattle $cattle)
        {
//            dd($request->all());
            $validated = $request->validated();
            DB::beginTransaction();

            try {

                foreach ($cattle->images as $element) {
                    $element->delete();
                }
//                foreach ($cattle->videos as $element) {
//                    $element->delete();
//                }

                /**
                 * Storing data
                 */

                $cattle->user_id        = $validated['user_id'];
                $cattle->name           = $validated['name'];
                $cattle->breed          = $validated['breed'];
                $cattle->price          = $validated['price'];
                $cattle->weight         = $validated['weight'];
                $cattle->teeth          = $validated['teeth'];
                $cattle->status         = $validated['status'];
                $cattle->is_approved    = $validated['is_approved'];
                $cattle->is_new_arrival = $validated['is_new_arrival'];
                $cattle->is_promoted    = $validated['is_promoted'];
                $cattle->is_auction     = $validated['is_auction'];

                $cattle->save();

                if ($cattle) {
                    if(isset($validated['image'])){
                        foreach ($validated['image'] as $data) {
                            $cattle_image = new CattleImage();

                            //Storing cattle image o s3
                            if (isset($data['url'])) {
                                $file     = $data['url'];
                                $filename = 'temp' . $file->extension();

                                $route    = $file->move(public_path('temp'), $filename);
                                $response = (
                                new s3(
                                    $route->getPathname() ?? ''
                                )
                                )->request();

                                if ($response->code != 200) {
                                    \Log::info(json_encode($response));
                                    Session::flash('message', $response->message);
                                    Session::flash('alert-class', 'alert-danger');
                                    return redirect()->back();
                                } elseif ($response->code == 200) {
                                    \Log::info(json_encode($response));

                                    $cattle_image->image_url   = $response->data->url;
                                    $cattle_image->image_title = $response->data->image_title;
                                    \File::delete(public_path('temp/' . $route->getFilename()));
                                }
                            }
                            $cattle_image->cattle_id = $cattle->id;
                            $cattle_image->save();
                        }
                    }
                    foreach ($validated['existing_image'] as $data){
                        $cattle_image = new CattleImage();
                        $url = $data['url'];
                        // Use explode to split the URL based on the forward slash
                        $parts = explode('/', $url);
                        // Get the last part of the array, which should be the filename
                        $filename = end($parts);

                        $cattle_image->cattle_id = $cattle->id;
                        $cattle_image->image_title = $filename;
                        $cattle_image->image_url   = $data['url'];

                        $cattle_image->save();
                    }

//                    $cattle_video = new CattleVideos();

                //video storing
//                    if (isset($validated['video_url'])) {
//
//                        $videos = CattleVideos::where('cattle_id', $cattle->id)->get();
//                        foreach ($videos as $item) {
//                            $item->delete();
//                        }
//
//                        $file     = $request->file('video_url');
//                        $filename = 'temp' . $file->extension();
//
//                        $route    = $file->move(public_path('temp'), $filename);
//                        $response = (
//                        new s3(
//                            $route->getPathname() ?? ''
//                        )
//                        )->request();
//                        if ($response->code != 200) {
//                            \Log::info(json_encode($response));
//                            Session::flash('message', $response->message);
//                            Session::flash('alert-class', 'alert-danger');
//                            return redirect()->back();
//                        } elseif ($response->code == 200) {
//                            \Log::info(json_encode($response));
//
//                            $cattle_video->video_url = $response->data->url;
//                            \File::delete(public_path('temp/' . $route->getFilename()));
//                        }
//                    } else {
//                        $cattle_video->video_url = $cattle->videos[0]->video_url ?? 'no video present';
//                    }
//
//                    $cattle_video->cattle_id   = $cattle->id;
//                    $cattle_video->video_title = $validated['video_title'];
//                    $cattle_video->video_url   = $cattle->images[0]->image_url;
//                    $cattle_video->save();
                }

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

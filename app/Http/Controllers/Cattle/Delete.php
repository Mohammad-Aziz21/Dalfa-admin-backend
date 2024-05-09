<?php

    namespace App\Http\Controllers\Cattle;

    use App\Http\Controllers\Controller;
    use App\Models\Cattle\Cattle;
    use App\Models\Cattle\CattleImage;
    use App\Models\Cattle\CattleVideos;
    use Illuminate\Http\Request;

    class Delete extends Controller
    {
        public function __invoke(Cattle $cattle)
        {
            foreach ($cattle->images as $item) {
                $item->delete();
            }
            foreach ($cattle->videos as $item) {
                $item->delete();
            }

            $cattle->delete();
            \Session::flash('message', 'Successfully Deleted');
            \Session::flash('alert-class', 'alert-danger');

            return redirect()->route('cattle.index');
        }
    }

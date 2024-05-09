<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\User\User;
    use Illuminate\Http\Request;

    class UserSearch extends Controller
    {
        public function __invoke(Request $request)
        {
            $searchTerm = $request->input('q');

//        $users = User::where(function ($query) use ($searchTerm) {
//            $query->where('first_name', 'like', '%' . $searchTerm . '%')
//                  ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
//        })
//                     ->get(['id', 'first_name', 'last_name']);

            $users = User::where('first_name', 'like', '%' . $searchTerm . '%')
                         ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                         ->get();
            return response()->json($users);
        }
    }

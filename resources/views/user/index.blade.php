@extends('layout/app')
@section('title', 'COC User Index')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 100px">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Farm</th>
                            <th scope="col">Address</th>
                            <th scope="col">Active</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)

                            <tr>

                                <td><img src="{{ $user->image_url ?? ''}}" alt="" class="avatar-sm"></td>
                                <td>
                                    <a href="{{ route('coc.show', $user->id) }}"
                                       class="text-dark">
                                        {{ $user->getFullNameAttribute() }}
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->detail->farm_title }}</td>
                                <td>{{ $user->detail->address }}</td>
                                <td>{!! ($user->is_active == 1) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}</td>

                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('coc.edit', $user->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('coc.password.edit', $user->id) }}">Reset Password</a>
                                            <a class="dropdown-item" href="{{ route('api.status.user', $user->id) }}">
                                                {{ $user->is_active == 0 ? 'Activate User' : 'Deactivate User'}}
                                            </a>
                                            <a class="dropdown-item"
                                               href="{{ route('coc.destroy', $user->id) }}">Delete</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

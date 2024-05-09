@extends('layout/app')
@section('title', 'COC User Information')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">

                            <img src="{{ $user->image_url }}" alt="" class="avatar-sm"
                                 style="height: 350px; width: 350px; padding: 10px; ">

                        </div>
                    </div>
                    <div class="text-muted mt-4">
                        <p><b>Name</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->getFullNameAttribute() }}
                        </p>
                        <p><b>Email</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->email }}
                        </p>
                        <p><b>Username</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->username }}</p>
                        <p><b>Gender</b></b><i class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->gender }}
                        </p>
                        <p><b>Active</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->is_active == 1 ? 'Yes' : 'No' }}</p>
                        <h5 class="font-size-15 mt-4">COC User Details :</h5>
                        <p><b>Farm name</b><i class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->detail->farm_title }}
                        </p>
                        <p><b>Farm Address</b><i class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->detail->address }}
                        </p>
                        <p><b>Farm Description</b><i class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->detail->description }}
                        </p>
                        <p><b>Farm Phone</b><i class="mdi mdi-chevron-right text-primary me-1"></i>{{ $user->detail->phone }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

@extends('layout.app')
@section('title', 'COC User Edit')
@section('content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit New COC User</h4>
                    <form id="businessForm" action="{{ route('coc.update', $user->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $user->id }}"> <!-- Replace 38 with the actual user ID -->
                        <input type="hidden" name="user_details_id" value="{{ $user->detail->id }}"> <!-- Replace 38 with the actual user ID -->
                        <input type="hidden" name="role_id" value="2">
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">First Name</label>
                            <div class="col-lg-10">
                                <input id="first_name" name="first_name" type="text"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       placeholder="Enter COC User First Name..." value="{{ $user->first_name  }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Last Name</label>
                            <div class="col-lg-10">
                                <input id="last_name" name="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       placeholder="Enter COC User Last Name..." value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Username</label>
                            <div class="col-lg-10">
                                <input id="username" name="username" type="text"
                                       class="form-control @error('username') is-invalid @enderror"
                                       placeholder="Enter COC User Username..." value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <input id="email" name="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Enter COC User Email..." value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Gender</label>
                            <div class="col-md-10">
                                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-md-10">
                                <select name="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $user->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $user->is_active == '1' ? 'selected' : '' }}>Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Upload COC User Image</label>
                            <div class="col-lg-10">
                                <input id="image_url" name="image_url" type="file"
                                       class="form-control @error('image_url') is-invalid @enderror"
                                       placeholder="Enter COC User image..." value="{{ old('image_url') }}">
                            </div>
                        </div>

                        <div class="border-top" style="margin-top: 15px;">
                            <label for="" class="col-form-label col-lg-2"><h4>Farm Details</h4></label>
                        </div>

                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Farm Title</label>
                            <div class="col-lg-10">
                                <input id="farm_title" name="farm_title" type="text"
                                       class="form-control @error('farm_title') is-invalid @enderror"
                                       placeholder="Enter COC User's Farm Title..." value="{{ $user->detail->farm_title }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Address</label>
                            <div class="col-lg-10">
                                <input id="address" name="address" type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       placeholder="Enter COC User Address..." value="{{ $user->detail->address }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3"
                                          placeholder="Enter COC User Description..."
                                          form="businessForm">{{ $user->detail->description ?? ''  }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Phone</label>
                            <div class="col-lg-10">
                                <input id="phone" name="phone" type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       placeholder="Enter COC User Phone..." value="{{ $user->detail->phone }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Upload COC User's Farm Image</label>
                            <div class="col-lg-10">
                                <input id="farm_logo_url" name="farm_logo_url" type="file"
                                       class="form-control @error('farm_logo_url') is-invalid @enderror"
                                       placeholder="Enter COC User image..." value="{{ old('farm_logo_url') }}">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Edit COC User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

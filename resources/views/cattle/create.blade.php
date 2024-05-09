@extends('layout.app')
@section('title', 'Cattle Create')
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
                    <h4 class="card-title mb-4">Create New Cattle</h4>
                    <form id="cattleForm" action="{{ route('cattle.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">COC User Name</label>
                            <div class="col-md-10">
                                <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                    <option value="">Start typing to search for COC Users</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input id="name" name="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter Cattle Name..." value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Breed</label>
                            <div class="col-lg-10">
                                <input id="breed" name="breed" type="text"
                                       class="form-control @error('breed') is-invalid @enderror"
                                       placeholder="Enter Cattle Breed..." value="{{ old('breed') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Price</label>
                            <div class="col-lg-10">
                                <input id="price" name="price" type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       placeholder="Enter Cattle Price..." value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Weight</label>
                            <div class="col-lg-10">
                                <input id="weight" name="weight" type="text"
                                       class="form-control @error('weight') is-invalid @enderror"
                                       placeholder="Enter Cattle Weight..." value="{{ old('weight') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3"
                                          placeholder="Enter COC User Description..."
                                          form="cattleForm">{{ old('description') ? old('description') : ''  }}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Teeth</label>
                            <div class="col-md-10">
                                <select name="teeth" class="form-select @error('teeth') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="1" {{ old('teeth') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('teeth') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('teeth') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('teeth') == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('teeth') == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('teeth') == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('teeth') == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ old('teeth') == '8' ? 'selected' : '' }}>8</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }} selected>Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Approved</label>
                            <div class="col-md-10">
                                <select name="is_approved" class="form-select @error('is_approved') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ old('is_approved') == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_approved') == '1' ? 'selected' : '' }} selected>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">New Arrival</label>
                            <div class="col-md-10">
                                <select name="is_new_arrival" class="form-select @error('is_new_arrival') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ old('is_new_arrival') == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_new_arrival') == '1' ? 'selected' : '' }} selected>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Promoted</label>
                            <div class="col-md-10">
                                <select name="is_promoted" class="form-select @error('is_promoted') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ old('is_promoted') == '0' ? 'selected' : '' }} selected>No</option>
                                    <option value="1" {{ old('is_promoted') == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Auction</label>
                            <div class="col-md-10">
                                <select name="is_auction" class="form-select @error('is_auction') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ old('is_auction') == '0' ? 'selected' : '' }} selected>No</option>
                                    <option value="1" {{ old('is_auction') == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>



                        <div id="generate">
                            <div class="row">
                                <input type="hidden" name="iterator[]" value="0">
                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Upload Cattle Image</label>
                                    <div class="col-lg-10">
                                        <input id="image_url_0" name="image[0][url]" type="file"
                                               class="form-control @error('image_url') is-invalid @enderror"
                                               placeholder="Enter Cattle image..." value="{{ old('image_url_0') }}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <input type="button" id="addMoreButton" class="btn btn-success mt-3 mt-lg-0" onclick="adding()" value="Add More Image"/>
                        <hr>

                        <!-- This is for future if video can be multiple  -->
{{--                        <div id="generate">--}}
{{--                            <div class="row">--}}
{{--                                <input type="hidden" name="iterator[]" value="0">--}}

{{--                                --}}
{{--                                --}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                        </div>--}}
{{--                        <input type="button" class="btn btn-success mt-3 mt-lg-0" onclick="adding()" value="Add"/>--}}
{{--                        <hr>--}}
                        <!-- This is for future if video can be multiple  -->


{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-form-label col-lg-2">Cattle Video title</label>--}}
{{--                            <div class="col-lg-10">--}}
{{--                                <input id="video_title" name="video_title" type="text"--}}
{{--                                       class="form-control @error('video_title') is-invalid @enderror"--}}
{{--                                       placeholder="Enter Cattle Video Title..." value="{{ old('video_title') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-form-label col-lg-2">Upload Cattle Video</label>--}}
{{--                            <div class="col-lg-10">--}}
{{--                                <input id="video_url" name="video_url" type="file"--}}
{{--                                       class="form-control @error('video_url') is-invalid @enderror"--}}
{{--                                       placeholder="Enter Cattle Video..." value="{{ old('video_url') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary" style="float: right;">Create Cattle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let count = 2;

        function adding() {
            if (count <= 4) {
                $('#generate').append(
                    '<div class="row" id="' + count + '">' +
                    '<input type="hidden" name="iterator[]" value="' + count + '">' +
                    '</div>' +
                    '<div class="row mb-4">' +
                    '<label class="col-form-label col-lg-2">Upload Cattle Image</label>' +
                    '<div class="col-lg-10">' +
                    '<input id="image_url_' + count + '" name="image[' + count + '][url]" type="file"' +
                    'class="form-control @error('image_url') is-invalid @enderror"' +
                    'placeholder="Enter Cattle image..." value="{{ old('image_url') }}">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-2 align-self-center" style=" margin-left: auto; ">' +
                    '<div class="d-grid">' +
                    '<input type="button" class="btn btn-primary" onclick="remove(' + count + ')" ' +
                    'value="Delete" />' +
                    '</div>' +
                    '</div>' +
                    '<hr>' +
                    '</div>'
                );
            }
            console.log('from add func 1', count)
            count++;
            console.log('from add func 2', count)
            if (count > 4) {
                $('#addMoreButton').hide();
            }
        }

        function remove(value) {
            console.log('from remove func 1', count)
            $('#'+value).remove();
            count--;
            console.log('from remove func 2', count)

            if (count <= 4) {
                $('#addMoreButton').show();
            }
        }

        $(document).ready(function() {
            $('#user_id').select2({
                ajax: {
                    url: '{{ route('api.user.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map(function (user) {
                                let fullName = user.first_name;
                                if (user.last_name !== null) {
                                    fullName += ' ' + user.last_name;
                                }
                                return {
                                    id: user.id,
                                    text: fullName+' - ('+user.username+')',
                                };
                            })
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2
            });
        });
    </script>
@endsection

@extends('layout.app')
@section('title', 'Cattle Edit')
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
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit New Cattle</h4>
                    <form id="cattleForm" action="{{ route('cattle.update', $cattle->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">COC Name</label>
                            <div class="col-md-10">
                                <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                    <option value="{{ $cattle->user->id ?? '' }}">{{ $cattle->user->getFullNameAttribute() ?? 'Start typing to search for COC Users' }}</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input id="name" name="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter Cattle Name..." value="{{ $cattle->name }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Breed</label>
                            <div class="col-lg-10">
                                <input id="breed" name="breed" type="text"
                                       class="form-control @error('breed') is-invalid @enderror"
                                       placeholder="Enter Cattle Breed..." value="{{ $cattle->breed }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Price</label>
                            <div class="col-lg-10">
                                <input id="price" name="price" type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       placeholder="Enter Cattle Price..." value="{{ $cattle->price }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Weight</label>
                            <div class="col-lg-10">
                                <input id="weight" name="weight" type="text"
                                       class="form-control @error('weight') is-invalid @enderror"
                                       placeholder="Enter Cattle Weight..." value="{{ $cattle->weight }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3"
                                          placeholder="Enter Cattle Description..."
                                          form="cattleForm">{{ $cattle->description ?? ''  }}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Teeth</label>
                            <div class="col-md-10">
                                <select name="teeth" class="form-select @error('teeth') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="1" {{ $cattle->teeth == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $cattle->teeth == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $cattle->teeth == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $cattle->teeth == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $cattle->teeth == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $cattle->teeth == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ $cattle->teeth == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ $cattle->teeth == '8' ? 'selected' : '' }}>8</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $cattle->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $cattle->status == '1' ? 'selected' : '' }}>Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Approved</label>
                            <div class="col-md-10">
                                <select name="is_approved" class="form-select @error('is_approved') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $cattle->is_approved == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $cattle->is_approved == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">New Arrival</label>
                            <div class="col-md-10">
                                <select name="is_new_arrival" class="form-select @error('is_new_arrival') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $cattle->is_new_arrival == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $cattle->is_new_arrival == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Promoted</label>
                            <div class="col-md-10">
                                <select name="is_promoted" class="form-select @error('is_promoted') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $cattle->is_promoted == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $cattle->is_promoted == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label class="col-form-label col-lg-2">Auction</label>
                            <div class="col-md-10">
                                <select name="is_auction" class="form-select @error('is_auction') is-invalid @enderror">
                                    <option selected disabled>Select</option>
                                    <option value="0" {{ $cattle->is_auction == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $cattle->is_auction == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>

{{--                        <div id="generate">--}}
{{--                                <div class="row checking-data" id="0">--}}
{{--                                     <input type="hidden" name="iterator[]" value="0">--}}
{{--                                    <div class="row mb-4">--}}
{{--                                        <label class="col-form-label col-lg-2">Upload Cattle Image</label>--}}
{{--                                        <div class="col-lg-10">--}}
{{--                                            <input id="image_url_0" name="image[0][url]" type="file"--}}
{{--                                                   class="form-control"--}}
{{--                                                   placeholder="Enter Cattle image...">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                        </div>--}}
{{--                        <input type="button" class="btn btn-success mt-3 mt-lg-0" id="addMoreButton" onclick="adding()" value="Add More Image"/>--}}
{{--                        <hr>--}}







                        <div id="generate">
                            @foreach($cattle->images as $index => $image)
                                <div class="row checking-data" id="existingImage_{{ $index }}">
                                    <input type="hidden" name="existing_image[1{{  $index }}][url]" value="{{ $image->image_url }}">
                                    <div class="row mb-4">
                                        <label class="col-form-label col-lg-2">Cattle Image</label>
                                        <div class="col-lg-8">
                                            <img src="{{ $image->image_url }}" alt="Existing Image" style="max-width: 100%; margin-top: 10px;">
                                        </div>
                                        <div class="col-lg-2 align-self-center">
                                            <div class="d-grid">
                                                <input type="button" class="btn btn-danger" onclick="removeExisting({{ $index }})" value="Remove"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                            <div id="newImagesContainer">
                                <!-- New images will be appended here -->
                            </div>
                        </div>

                        <input type="button" class="btn btn-success mt-3 mt-lg-0" id="addMoreButton" onclick="adding()" value="Add More Image"/>
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
{{--                            <label class="col-form-label col-lg-2">Cattle Vedio title</label>--}}
{{--                            <div class="col-lg-10">--}}
{{--                                <input id="video_title" name="video_title" type="text"--}}
{{--                                       class="form-control @error('video_title') is-invalid @enderror"--}}
{{--                                       placeholder="Enter Cattle Video Title..." value="{{ $cattle->videos[0]->video_title ?? '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-form-label col-lg-2">Upload Cattle Video</label>--}}
{{--                            <div class="col-lg-10">--}}
{{--                                <input id="video_url" name="video_url" type="file"--}}
{{--                                       class="form-control @error('video_url') is-invalid @enderror"--}}
{{--                                       placeholder="Enter Cattle Video..." value="{{ $cattle->video_url }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row justify-content-end">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary" style="float: right;">Save Cattle</button>
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

        let count = {{ count($cattle->images) }};

        function readURL(input, count) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_image_' + count).attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function adding() {
            if (count < 4) {
                $('#newImagesContainer').append(
                    '<div class="row" id="newImage_' + count + '">' +
                    '<input type="hidden" name="iterator[]" value="' + count + '">' +
                    '<div class="row mb-4">' +
                    '<label class="col-form-label col-lg-2">Upload Cattle Image</label>' +
                    '<div class="col-lg-8">' +
                    '<input id="image_url_' + count + '" name="image[' + count + '][url]" type="file"' +
                    'class="form-control @error('image_url') is-invalid @enderror" onchange="readURL(this, ' + count + ')"' +
                    'placeholder="Enter Cattle image...">' +
                    '<img id="preview_image_' + count + '" src="#" alt="Preview" style="max-width: 100%; margin-top: 10px; display: none;">' +
                    '</div>' +
                    '<div class="col-lg-2 align-self-center" style=" margin-left: auto; ">' +
                    '<div class="d-grid">' +
                    '<input type="button" class="btn btn-primary" onclick="removeNew(' + count + ')" ' +
                    'value="Delete" />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<hr>' +
                    '</div>'
                );
                count++;
            }

            if (count === 4) {
                $('#addMoreButton').hide();
            }
        }

        function removeExisting(index) {
            // Perform logic to mark this existing image for removal or update backend accordingly
            $('#existingImage_' + index).remove();
            count--;
            if(count === 0){
                adding();
            }

            // Update the count variable in the form to reflect the correct count
            $('#addMoreButton').show(); // Show the addMoreButton in case the count is less than 4

            // Update the iterator values for the remaining images
            $('[name^="iterator"]').each(function () {
                let currentCount = parseInt($(this).val());
                if (currentCount > index) {
                    $(this).val(currentCount - 1);
                }
            });
        }

        function removeNew(value) {
            $('#newImage_' + value).remove();
            count--;
            if(count === 0){
                adding();
            }
            if (count < 4) {
                $('#addMoreButton').show();
            }
        }





























        {{--let count = 2;--}}

        {{--function adding() {--}}
        {{--    if (count <= 4) {--}}
        {{--        $('#generate').append(--}}
        {{--            '<div class="row" id="' + count + '">' +--}}
        {{--            '<input type="hidden" name="iterator[]" value="' + count + '">' +--}}
        {{--            '<div class="row mb-4">' +--}}
        {{--            '<label class="col-form-label col-lg-2">Upload Cattle Image</label>' +--}}
        {{--            '<div class="col-lg-10">' +--}}
        {{--            '<input id="image_url_' + count + '" name="image[' + count + '][url]" type="file"' +--}}
        {{--            'class="form-control @error('image_url') is-invalid @enderror"' +--}}
        {{--            'placeholder="Enter Cattle image..." value="{{ old('image_url') }}">' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>' +--}}
        {{--            '<div class="col-lg-2 align-self-center" style=" margin-left: auto; ">' +--}}
        {{--            '<div class="d-grid">' +--}}
        {{--            '<input type="button" class="btn btn-primary" onclick="remove(' + count + ')" ' +--}}
        {{--            'value="Delete" />' +--}}
        {{--            '</div>' +--}}
        {{--            '</div>' +--}}
        {{--            '<hr>' +--}}
        {{--            '</div>'--}}
        {{--        );--}}
        {{--    }--}}
        {{--    console.log('from add func 1', count)--}}
        {{--    count++;--}}
        {{--    console.log('from add func 2', count)--}}
        {{--    if (count > 4) {--}}
        {{--        $('#addMoreButton').hide();--}}
        {{--    }--}}
        {{--}--}}

        {{--function remove(value) {--}}
        {{--    console.log('from remove func 1', count)--}}
        {{--    $('#'+value).remove();--}}
        {{--    count--;--}}
        {{--    console.log('from remove func 2', count)--}}

        {{--    if (count <= 4) {--}}
        {{--        $('#addMoreButton').show();--}}
        {{--    }--}}
        {{--}--}}

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

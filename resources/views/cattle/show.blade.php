@extends('layout/app')
@section('title', 'Cattle Information Information')
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
                            @foreach($cattle->images as $image)
                                <img src="{{ $image->image_url ?? '' }}" alt="" class="avatar-sm"
                                     style="height: 350px; width: 350px; padding: 10px; ">
                            @endforeach
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4">Cattle Information Details :</h5>
                    <div class="text-muted mt-4">
                        <p><b>Title</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->name }}</p>
                        <p><b>Breed</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->breed }}</p>
                        <p><b>Teeth</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->teeth }}</p>
                        <p><b>Weight</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->weight }}</p>
                        <p><b>Price</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->price }}</p>
                        <p><b>Description</b><i
                                class="mdi mdi-chevron-right text-primary me-1"></i>{{ $cattle->description ?? 'no description available' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

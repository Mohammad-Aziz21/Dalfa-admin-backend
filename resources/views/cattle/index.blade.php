@extends('layout/app')
@section('title', 'Cattle\'s Index')
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
                            <th scope="col">Date</th>
                            <th scope="col">Approved</th>
                            <th scope="col">New Arrival</th>
                            <th scope="col">Promoted</th>
                            <th scope="col">Auction</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cattle as $key => $element)

                            <tr>

                                <td><img src="{{ $element->images[0]->image_url ?? ''}}" alt="" class="avatar-sm"></td>
                                <td>
                                    <h5 class="text-truncate font-size-14">
                                        <a href="{{ route('cattle.show', $element->id) }}" class="text-dark">
                                            {{ $element->name }}
                                        </a>
                                    </h5>
                                    <p class="text-muted mb-0">{{ $element->user->detail->farm_title }}</p>
                                </td>
                                <td>{{ $element->created_at->format('F j, Y') }}</td>
                                <td>{!! ($element->is_approved == 1) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}</td>
                                <td>{!! ($element->is_new_arrival == 1) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}</td>
                                <td>{!! ($element->is_promoted == 1) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}</td>
                                <td>{!! ($element->is_auction == 1) ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}</td>

                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('cattle.edit', $element->id) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('api.status.cattle', $element->id) }}">
                                                {{ $element->is_approved == 0 ? 'Approved Cattle' : 'Unapproved Cattle'}}
                                            </a>
                                            <a class="dropdown-item"
                                               href="{{ route('cattle.destroy', $element->id) }}">Delete</a>
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

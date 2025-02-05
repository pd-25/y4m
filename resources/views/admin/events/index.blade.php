@extends('admin.layout.main')
@section('title', 'All Events | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Events</h5>
                        
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        
                        <a class="btn btn-sm btn-outline-success float-end" href="{{ route('events.create') }}">New Event</a>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" height="100px" width="100px">
                                        </td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ Str::limit($event->description, 100, '...') }}</td>
                                        <td>{{ $event->venue }}</td>
                                        <td>
                                            <a href="{{ route('events.edit', $event->id) }}"><i class="ri-pencil-fill"></i></a>
                                            
                                            <form method="POST" action="{{ route('events.destroy', $event->id) }}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-icon show_confirm" data-toggle="tooltip" title='Delete'>
                                                    <i class="ri-delete-bin-2-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layout.main')
@section('title', 'All Programs | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">All Programs</h5>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        <a class="btn btn-sm btn-outline-success float-end" href="{{ route('programs.create') }}">New Program</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programs as $program)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $program->title }}</td>
                                        <td>{{ $program->slug }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $program->image) }}" alt="Program Image" height="100px" width="100px">
                                        </td>
                                        <td>
                                            <a href="{{ route('programs.edit', $program->id) }}"><i class="ri-pencil-fill"></i></a>
                                            <form method="POST" action="{{ route('programs.destroy', $program->id) }}" class="d-inline-block pl-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-icon show_confirm" data-toggle="tooltip" title="Delete">
                                                    <i class="ri-delete-bin-2-fill"></i>
                                                </button>
                                            </form>
                                            {{-- <a href="{{ route('faqs.index', ['program_id' => $program->id]) }}"><i class="ri-question-answer-fill"></i></a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

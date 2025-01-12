@extends('admin.layout.main')
@section('title', 'All Leads | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">All Leads</h5>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        {{-- <a class="btn btn-sm btn-outline-success float-end" href="{{ route('category-mamages.create') }}">New
                            Product</a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($leads as $lead)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $lead->first_name.' '.$lead->last_name }}</td>
                                        <td>{{$lead->email}}</td>
                                        <td>{{$lead->phone}}</td>
                                        <td>{{$lead->subject}}</td>
                                        <td>{{$lead->message}}</td>
                                        
                                        <td>
                                            {{-- <a href="{{ route('category-mamages.edit', $lead->slug) }}"><i
                                                    class="ri-pencil-fill"></i></a> --}}
                                            <form method="POST" action="{{ route('category-mamages.destroy', $lead->slug) }}"
                                                class="d-inline-block pl-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-icon show_confirm"
                                                    data-toggle="tooltip" title='Delete'>

                                                    <i class="ri-delete-bin-2-fill"></i>

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        No Record Found
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

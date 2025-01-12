@extends('admin.layout.main')
@section('title', 'All Applications | ')
@section('content')
<style>
    .message-column {
        max-width: 200px; /* Adjust the width as needed */
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        {{-- @dd($jobapplications) --}}
                        <h5 class="card-title">All Jobs</h5>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    @if (last(request()->segments()) == config('core.PERMNT'))
                                        <th scope="col">Job Title</th>
                                    @endif

                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="message-column">Message</th>
                                    <th scope="col">Apply Dt.</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($jobapplications as $jobapplication)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                        @if (last(request()->segments()) == config('core.PERMNT'))
                                            <td>{{ $jobapplication?->job?->title }}</td>
                                        @endif
                                        <td>{{ $jobapplication->first_name.' '.$jobapplication->last_name }}</td>
                                        <td>{{ $jobapplication->form_Phone }}</td>
                                        <td>{{ $jobapplication->form_Email }}</td>
                                        <td><p class="m-0">{{ $jobapplication->form_message }}</p></td>
                                        <td>{{ \Carbon\Carbon::parse(@$jobapplication->created_at)->format('dM, Y') }}</td>
                                        <td>
                                            <a target="_blank" href="{{ asset('storage/'.$jobapplication->fileToUpload) }}"><i
                                                    class="ri-eye-fill"></i></a>
                                            <form method="POST" action="{{ route('admin.deleteApplication', $jobapplication->slug) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

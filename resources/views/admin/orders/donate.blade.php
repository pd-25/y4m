@extends('admin.layout.main')
@section('title', 'All Orders | ')
@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Donates</h5>

                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donate as $donates)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $donates->order_id }}</td>
                                    <td>{{ @$donates->name }}</td>
                                    <td>{{ @$donates->email }}</td>
                                    <td>{{ @$donates->amount }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Record Found</td>
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

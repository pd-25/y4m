@extends('admin.layout.main')

@section('title', 'Product Reviews | ')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reviews for {{ $productname->name }}</h5>
                        @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                        <a class="btn btn-sm btn-outline-secondary float-end" href="{{ route('product-mamages.index') }}">Back to Products</a>
                        
                        @if ($product->isEmpty())
                            <p class="alert alert-info">No reviews found for this product.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $index => $review)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $review->user->name ?? 'Unknown' }}</td>
                                            <td>{{ $review->star }} / 5</td>
                                            <td>{{ $review->note }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('reviews.updateStatus', $review->id) }}" class="d-inline-block status-form">
                                                    @csrf
                                                    @method('PUT')
                                                    
                                                    <button type="button" class="btn btn-sm 
                                                        @if($review->status == 'pending')
                                                            btn-warning
                                                        @else
                                                            btn-success
                                                        @endif
                                                    show_status_confirm">
                                                        {{ ucfirst($review->status) }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : 'N/A' }}</td>
                                            <td>
                                                <!-- Delete Button -->
                                                <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline-block delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="button" class="btn btn-sm btn-danger show_delete_confirm" data-toggle="tooltip" title="Delete">
                                                        <i class="ri-delete-bin-2-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Confirm Status Change
            document.querySelectorAll('.show_status_confirm').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let form = this.closest('.status-form');
                    let status = this.innerText.toLowerCase();
                    let actionText = (status === 'pending') ? 'approve' : 'revert';

                    Swal.fire({
                        title: `Are you sure you want to ${actionText} this review?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, proceed!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Confirm Deletion
            document.querySelectorAll('.show_delete_confirm').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let form = this.closest('.delete-form');

                    Swal.fire({
                        title: 'Are you sure you want to delete this review?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

@extends('admin.layout.main')
@section('title', 'All Products | ')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">All Products</h5>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        <a class="btn btn-sm btn-outline-success float-end" href="{{ route('product-mamages.create') }}">New
                            Product</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $product->name }}</td>

                                        <td>{{ Str::limit($product->description, 100, '...') }}</td>
                                        <td>{{ $product->quantity_in_stock }}</td>
                                        <td><img src="{{ asset('storage/' . $product?->productPrimaryImage?->image_path) }}" alt=""
                                                srcset="" height="100px" width="100px"></td>
                                        <td>
                                            <a href="{{ route('product-mamages.edit', $product->slug) }}"><i
                                                    class="ri-pencil-fill"></i></a>
                                            <form method="POST" action="{{ route('product-mamages.destroy', $product->id) }}"
                                                class="d-inline-block pl-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-icon show_confirm"
                                                    data-toggle="tooltip" title='Delete'>

                                                    <i class="ri-delete-bin-2-fill"></i>

                                                </button>
                                            </form>
                                            <a href="{{ route('reviews.showByProduct', $product->id) }}"><i
                                                class="ri-question-answer-fill"></i></a>
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

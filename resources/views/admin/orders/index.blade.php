@extends('admin.layout.main')
@section('title', 'All Orders | ')
@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Orders</h5>

                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Product Size</th>
                                <th scope="col">Product Color</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ @$order->product_name }}</td>
                                    <td></td>
                                    <td>{{ @$order->product_size }}</td>
                                    <td>{{ @$order->product_color }}</td>
                                    <td>${{ number_format($order->product_price, 2) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') }}</td>
                                    {{-- <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-info">
                                            <i class="ri-eye-fill"></i> View
                                        </a>
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="ri-pencil-fill"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('orders.destroy', $order->id) }}" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger show_confirm" title="Delete">
                                                <i class="ri-delete-bin-2-fill"></i> Delete
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>

                                {{-- <!-- Expandable row for Order Items -->
                                @if ($order->orderItems->isNotEmpty())
                                    <tr>
                                        <td colspan="7">
                                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#orderItems-{{ $order->id }}">
                                                View Items
                                            </button>
                                            <div class="collapse" id="orderItems-{{ $order->id }}">
                                                <table class="table mt-2">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Item Name</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Unit Price</th>
                                                            <th scope="col">Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->orderItems as $item)
                                                            <tr>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>${{ number_format($item->ProductVariant->price, 2) }}</td>
                                                                <td>${{ number_format($item->quantity * $item->productVariant->price, 2) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                @endif --}}
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

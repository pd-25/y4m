@extends('admin.layout.main')
@section('title', 'Edit Order | ')
@section('content')

<section class="section dashboard">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Order</h5>
                    
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Customer Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $order->email }}" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Order Status</label>
                            <select class="form-control" id="status" name="status" required>
                                @foreach($statusOptions as $status)
                                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Street Address -->
                        <div class="mb-3">
                            <label for="street_address" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $order->street_address }}" required>
                        </div>

                        <!-- Apartment/House No -->
                        <div class="mb-3">
                            <label for="appertment_house_no" class="form-label">Apartment/House No</label>
                            <input type="text" class="form-control" id="appertment_house_no" name="appertment_house_no" value="{{ $order->appertment_house_no }}">
                        </div>

                        <!-- Town/City -->
                        <div class="mb-3">
                            <label for="town_city" class="form-label">Town/City</label>
                            <input type="text" class="form-control" id="town_city" name="town_city" value="{{ $order->town_city }}" required>
                        </div>

                        <!-- State -->
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ $order->state }}" required>
                        </div>

                        <!-- Postcode -->
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $order->postcode }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Order</button>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

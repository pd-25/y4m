@extends('admin.layout.main')
@section('title', 'Invoice | ')
@section('content')

<section class="section invoice">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title">Invoice</h5>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</p>
                    </div>

                    <!-- Customer and Order Details -->
                    <div class="mb-4">
                        <h6><strong>Order Number:</strong> #{{ $order->order_number }}</h6>
                        <h6 class="mb-3">Customer</h6>
                        <p><strong>Name:</strong> {{ $order->name ?? $order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $order->email ?? $order->user->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone ?? $order->user->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->street_address }}, {{ $order->town_city }}, {{ $order->state }}, {{ $order->postcode }}, {{ $order->country }}</p>
                    </div>

                    <!-- Order Summary -->
                    <h6 class="mb-3">Order Summary</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Subtotal</th>
                                <th>${{ number_format($order->total_price, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-right">Total</th>
                                <th>${{ number_format($order->total_price, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Payment Details -->
                    <div class="mt-4">
                        <p><strong>Payment Mode:</strong> {{ ucfirst($order->payment_mode) }}</p>
                        <p><strong>Payment Reference No:</strong> {{ $order->payment_ref_no }}</p>
                    </div>

                    <!-- Print and Back to Orders Buttons -->
                    <div class="d-print-none">
                        <button onclick="printInvoice()" class="btn btn-primary mt-3">Print</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function printInvoice() {
        window.print();
    }
</script>
<style>
    @media print {
        @page {
    margin: 0;
}
    /* Hide everything except the .invoice section */
    body * {
        visibility: hidden;
    }
    .card {
    box-shadow: none !important;
}
    .invoice, .invoice * {
        visibility: visible;
    }

    .invoice {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    /* Hide the print and back buttons specifically */
    .d-print-none {
        display: none !important;
    }
}

    </style>
@endsection

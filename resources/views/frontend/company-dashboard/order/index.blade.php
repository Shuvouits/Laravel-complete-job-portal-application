@extends('frontend.master')

@section('main')

<style>
    .table{

        padding : 15px;
    }
    .table tr{
        border-bottom : 1px solid #1ca77459;
    }
</style>

<main class="main">


    @include('frontend.body.breadcrumb')

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">



                @include('frontend.body.sidebar')


                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-15 color-brand-1 text-center">All Orders</h3>

                        <div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order & Transaction</th>
                                        <th>Company</th>
                                        <th>Plan</th>
                                        <th>Paid Amount</th>
                                        <th>Main Price</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            #{{ $order->order_id }}
                                            <br>
                                            Transaction: {{ $order->transaction_id }}
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="mr-2">
                                                    <img style="width: 50px; height:50px; object-fit:cover"
                                                        src="{{ asset($order->company->logo) }}" alt="">
                                                </div>
                                                <div>
                                                    <b>{{ $order->company->name }}</b>
                                                    <br>
                                                    {{ $order->company->email }}

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $order->package_name }}
                                        </td>

                                        <td>
                                            {{ $order->amount }} {{ $order->paid_in_currency }}
                                        </td>
                                        <td>
                                            {{ $order->default_amount }}
                                        </td>
                                        <td>
                                            {{ $order->payment_provider }}
                                        </td>
                                        <td>
                                            <p class="badge bg-primary text-light">{{ $order->payment_status }}</p>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="btn-sm btn btn-primary">View Details</a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>







                    </div>
                </div>


            </div>
        </div>
    </section>

</main>


@endsection

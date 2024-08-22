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



                @include('frontend.company-dashboard.sidebar')


                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-15 color-brand-1 text-center">All Orders</h3>

                        <div>
                            <table class="table table-hover">
                                <tr>
                                    <th>Order No</th>

                                    <th>Plan</th>
                                    <th>Paid Amount</th>

                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                #{{ $order->order_id }}
                                            </td>

                                            <td>
                                                {{ $order->package_name }}
                                            </td>

                                            <td>
                                                {{ $order->amount }} {{ $order->paid_in_currency }}
                                            </td>

                                            <td>
                                                {{ $order->payment_provider }}
                                            </td>
                                            <td>
                                                <p class="badge bg-primary text-light">{{ $order->payment_status }}</p>
                                            </td>

                                            <td>
                                                <a href="{{ route('company.orders.show', $order->id) }}"
                                                    class="btn-sm btn btn-primary"><i class="fas fa-eye"></i></a>

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

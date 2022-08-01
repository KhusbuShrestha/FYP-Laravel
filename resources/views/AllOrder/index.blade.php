@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{-- <div class="card-header">
                        <a href="restaurant/create" class="btn btn-primary btn-sm">Add Restaurant Detail <i class="fas fa-plus-circle"></i></a>
                    </div> --}}
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User_id</th>
                                    <th>Total</th>
                                    <th>Delivery Charge</th>
                                    <th>Grand Total</th>
                                    <th>Delivery Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->user_id }}
                                        </td>
                                        <td>
                                            {{ $order->total }}
                                        </td>
                                        <td>
                                            {{ $order->deliveryCharge }}
                                        </td>
                                        <td>
                                            {{ $order->grandTotal }}
                                        </td>
                                        <td>
                                            {{ $order->deliveryStatus }}
                                        </td>

                                        @if ($order->deliveryStatus == 'delivered')
                                            <td>

                                                <i class="fa fa-check" style="font-size:36px;color:green;"
                                                    aria-hidden="true" class="success"></i>
                                            </td>
                                        @endif

                                        @if ($order->deliveryStatus == 'inprocess')
                                            <td>

                                                <i class="fa fa-spinner " style="font-size:36px;color:red;"
                                                    aria-hidden="true"></i>

                                            </td>
                                        @endif

                                        <td>
                                            <a href="/orderDescription/{{ $order->id }}"
                                                class="btn bagde bg-success">View
                                                <i class="far fa-eye"></i></a>
                                        </td>

                                        <td>
                                            <a href="/allOrders/{{ $order->id }}/edit"
                                                class="btn bagde bg-primary">Verify
                                                <i class="far fa-edit"></i></a>
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
@endsection

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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Order Id</th>
                                    <th>Product Id</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($orderDescriptions as $od)
                                    <tr>
                                        <td>
                                            {{ $od->id }}
                                        </td>
                                        <td>
                                            {{ $od->name }}
                                        </td>
                                        <td>
                                            {{ $od->quantity }}
                                        </td>
                                        <td>
                                            {{ $od->amount }}
                                        </td>
                                        <td>
                                            {{ $od->order_id }}
                                        </td>
                                        <td>
                                            {{ $od->product_id }}
                                        </td>

                                       

                                        {{-- <td>
                                            <a href="/all/{{ $od->id }}/edit" class="btn bagde bg-primary">Check <i class="far fa-edit"></i></a>
                                        </td> --}}

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

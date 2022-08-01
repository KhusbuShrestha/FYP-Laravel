@extends('backend.app')

<link rel="stylesheet" href="../css/button.css">
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
                    <div class="card-header">
                        <a href="/vendor/create" class="button"><span>Vendor <i class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Vendor_ID</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                   

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($vendors as $vendor)
                                    <tr>
                                        <td>
                                            {{ $vendor->id }}
                                        </td>
                                        <td>
                                            {{ $vendor->name }}
                                        </td>
                                        <td>
                                            {{ $vendor->number }}
                                        </td>
                                        <td>
                                            {{ $vendor->email }}
                                        </td>
                                        <td>
                                            {{ $vendor->city }}
                                        </td>
                                        <td>
                                            {{ $vendor->product->name }}
                                            {{-- {{ $vendor->product_id }} --}}
                                        </td>
                                        <td>
                                            <a href="/vendor/{{ $vendor->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
                                        </td>
                                        
                                    </tr>
                                        
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                        <a href="/producer" class="button"><Span><i class="fas fa-arrow-circle-left"></i> View Producer</Span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

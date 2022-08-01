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
                        <a href="/shipping/create" class="button"><span>Add Description <i class="fas fa-plus-circle"></span></i></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shipping</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               

                                 @foreach ($shippings as $shipping)
                                    <tr>
                                        <td>
                                            {{ $shipping->id }}
                                        </td>
                                        <td>
                                            {{ $shipping->description }}
                                        </td>
                                        
                                        <td>
                                            <a href="/shipping/{{ $shipping->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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

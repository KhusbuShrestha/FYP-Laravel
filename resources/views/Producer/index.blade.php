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
                        <a href="/vendor" class="button"><Span><i class="fas fa-arrow-circle-left"></i> Back</Span></a>
                    </div>
                    

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Producer_ID</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Caegory</th>
                                    <th>Address</th>
                                    
                                   

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($producers as $producer)
                                    <tr>
                                        <td>
                                            {{ $producer->id }}
                                        </td>
                                        <td>
                                            {{ $producer->name }}
                                        </td>
                                        <td>
                                            {{ $producer->phone_number }}
                                        </td>
                                        <td>
                                            {{ $producer->category }}
                                        </td>
                                        <td>
                                            {{ $producer->address }}
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

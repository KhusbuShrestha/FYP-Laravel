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
                        <a href="/contact/create" class="button"> <span>Contact <i class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Contact_ID</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                 @foreach ($contacts as $contact)
                                    <tr>
                                        <td>
                                            {{ $contact->id }}
                                        </td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                        <td>
                                            {{ $contact->number }}
                                        </td>
                                        <td>
                                            {{ $contact->address }}
                                        </td>
                                        
                                        <td>
                                            <a href="/contact/{{ $contact->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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

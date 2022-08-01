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
                        <a href="/about/create" class="button"><span>Add Description <i class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>About Us</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               

                                 @foreach ($about as $about_us)
                                    <tr>
                                        <td>
                                            {{ $about_us->id }}
                                        </td>
                                        <td>
                                            {{ $about_us->description }}
                                        </td>
                                        
                                         <td>
                                            <a href="/about/{{ $about_us->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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

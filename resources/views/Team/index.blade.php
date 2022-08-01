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
                        <a href="/team/create" class="button"><span>Add Description <i class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Our Team</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               

                                @foreach ($teams as $team)
                                    <tr>
                                        <td>
                                            {{ $team->id }}
                                        </td>
                                        <td>
                                            {{ $team->description }}
                                        </td>
                                        
                                        <td>
                                            <a href="/team/{{ $team->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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

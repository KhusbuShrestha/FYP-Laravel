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
                        <a href="/category/create" style="vertical-align:middle" class="button"  ><span>Add Category <i class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($category->image) }}" width="50" alt="">

                                        </td>
                                        
                                        <td>
                                            <a href="/category/{{ $category->id }}/edit" class="btn bagde bg-primary" >Edit <i class="far fa-edit"></i></a>
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

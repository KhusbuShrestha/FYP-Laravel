@extends('backend.app')
{{-- @extends('admin.admin') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/order" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="/order" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div> 
                            
                            <button type="submit" class="btn btn-primary my-2 btn-sm">Submit <i class="far fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
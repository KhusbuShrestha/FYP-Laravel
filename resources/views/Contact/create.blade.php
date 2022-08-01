@extends('backend.app')
<link rel="stylesheet" href="../css/buttonback.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/contact" class="button"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/contact" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input id="email" class="form-control" type="text" name="email" placeholder="Company Email" required>
                            </div> 
                            <div class="form-group">
                                <label for="number">Number <span class="text-danger">*</span></label>
                                <input id="number" class="form-control" type="text" name="number" placeholder="Company Number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input id="address" class="form-control" type="text" name="address" placeholder="Company Address" required>
                            </div>
                            
                            <button type="submit" class="button"><span>Submit <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
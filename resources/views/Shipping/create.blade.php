@extends('backend.app')
<link rel="stylesheet" href="../css/buttonback.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/shipping" class="button"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/shipping" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="description">Description of Shipping <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Company Shipping Policy"></textarea>
                            </div> 
                            
                            <button type="submit" class="button"><span>Submit <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
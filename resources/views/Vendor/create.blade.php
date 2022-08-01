@extends('backend.app')
<link rel="stylesheet" href="../css/buttonback.css">

@section('content')
    <div class="container" background-color: #EBEBEB;>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/vendor" class="button"><Span><i class="fas fa-arrow-circle-left"></i> Back</Span></a>
                    </div>

                    <div class="card-body">
                        <form action="/vendor" method="post" background-color: #EBEBEB;>
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Vendor Name">
                            </div>
                            <div class="form-group">
                                <label for="number">Number <span class="text-danger">*</span></label>
                                <input id="number" class="form-control" type="text" name="number" placeholder="Vendor Number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input id="email" class="form-control" type="text" name="email" placeholder="Vendor Email">
                            </div> 
                            <div class="form-group">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input id="city" class="form-control" type="text" name="city" placeholder="Vendor City">
                            </div>
                            <div class="form-group">
                                <label for="product_id">Select Product <span class="text-danger">*</span></label>
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        
                                    @endforeach
                                </select>

                            </div>
                            
                            <button type="submit" class="button"><span>Submit <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
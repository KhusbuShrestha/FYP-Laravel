@extends('backend.app')
<link rel="stylesheet" href="../css/buttonback.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/product" class="button"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="sku">SKU <span class="text-danger">*</span></label>
                                <input id="sku" class="form-control" type="text" name="sku" placeholder="Product SKU">
                            </div>
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Product Name">
                            </div> 
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input id="price" class="form-control" type="number" name="price" placeholder="Product Price">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <label for="discount">Discount</label>
                                    <input id="discount" class="form-control" type="number" name="discount" placeholder="Discount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sp">Selling Price</label>
                                    <input id="sp" class="form-control" type="number" name="sp" readonly>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Product Description"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="picture">Upload <span class="text-danger">*</span></label>
                                <input id="picture" class="form-control-file" type="file" name="picture">
                            </div>
                            
                            <button type="submit" class="button"><span>Submit <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('backend.app')
<link rel="stylesheet" href="../css/buttonback.css">
 
<style>
   
    .button{
        display: inline-block;
  border-radius: 4px;
  background-color: #334756;
  border: none;
  color: #fafbfe;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
 
    }
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  color: #fafbfe
}
 
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  /* right: -20px; */
  left: 20px;
  transition: 0.5s;
  color: #fafbfe
}
 
.button:hover span {
  /* padding-right: 25px; */
  padding-left: 25px;
  color: #fafbfe
}
 
.button:hover span:after {
  opacity: 1;
  left: 0;
  color: #fafbfe
 
}
 
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    width: 100%;
}
.sidebar{
    position: fixed;
    /* height: 100%; */
    /* height: 100px; */
    width: 250px;
    background: #334756;
    transition: all 0.5s ease;
}
.sidebar.active{
    width: 60px;
}
 
.sidebar .nav-links li a{
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
}
/* .sidebar .nav-links li a:hover{
    background: #ec7474;
} */
.sidebar .nav-links li a i{
    /* background: red; */
    min-width: 60px;
    text-align: center;
    color: #fff;
    font-size: 18px;
}
.sidebar .nav-links li a .link-name{
    color: #fff ;
    font-size: 17px;
    font-weight: 400;
    white-space: nowrap;
}
 
 
@media (max-width: 658px){
    .home-section nav .sidebar-btn .dash{
         display: none;
    }
    .home-section nav .profile{
        min-width: 50px;
        height: 50px;
    }
 
}
 
</style>
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/product" class="button"><span><i class="fas fa-arrow-circle-left"></i></span> Back</a>
                    </div>
 
                    <div class="card-body">
                        <form action="/product/{{ $products->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input id="sku" class="form-control" type="text" name="sku" value="{{ $products->sku }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $products->name }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="number" name="price" value="{{ $products->price }}">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input id="discount" class="form-control" type="number" name="discount" value="{{ $products->discount }}">
                            </div>
                            <div class="form-group">
                                <label for="sp">Selling Price</label>
                                <input id="sp" class="form-control" type="number" name="sp" value="{{ $products->sp }}">
                            </div>
                           
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" type="text" class="form-control" rows="3" >{{ $products->description }}</textarea>
                            </div>
                       
                            <div class="form-group">
                                <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"  {{ $category->id == $products->category_id ?'selected': '' }}>{{ $category->name }}</option>
                                       
                                    @endforeach
                                </select>
 
                            </div>
                            <div class="form-group">
                                <label for="picture">Upload</label>
                                <input id="picture" class="form-control-file" type="file" name="picture">
                            </div>
                            <button type="submit" class="button"><span>update Record <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

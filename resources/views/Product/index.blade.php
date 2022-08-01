@extends('backend.app')
<link rel="stylesheet" href="../css/button.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

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
/* .sidebar .logo-details{
    height: 80px;
    width: 100%;
    background: #111;
    display: flex;
    align-items: center;
    /* margin-top: 15px; */   
} */
/* .sidebar .logo-details i{
    font-size: 28px;
    color: #ff3838;
    min-width: 60px;
    text-align: center;
} */
/* .sidebar .logo-details .logo_name{
    font-size: 24px;
    font-weight: 500;
    color: #fff;
}
.sidebar .nav-links{
    margin-top: 16px;
}
.sidebar .nav-links li{
    height: 50px;
    list-style: none;
    width: 100%;
} */
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

/****************** home section ******************/
/* .home-section{
    background: #f5f5f5;
    position: relative;
    min-height: 100vh;
    width: calc(100% - 240px);
    left: 240px;
    transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
    width: calc(100% - 60px);
    left: 60px;
}
.home-section nav{
    position: fixed;
    width: calc(100% - 240px);
    left: 240px;
    height: 80px;
    background: #fff;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.5s ease;
} 
.sidebar.active ~ .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
}
.home-section nav .sidebar-btn{
    display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: 400;
}
.home-section nav .sidebar-btn i{
    font-size: 25px;
    margin-right: 10px;
}
.home-section nav .profile{
    display: flex;
    align-items: center;
    height: 50px;
    min-width: 150px;
    background: #F5F6FA;
    border: 2px solid #EFEEF1;
    border-radius: 6px;
    padding: 0 15px 0 2px;
}
nav .profile i{
    margin-left: 30px;
    /* object-fit: cover;
    border-radius: 6px; */
}
/* nav .profile .admin-name{
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin: 0 10px;
    white-space: nowrap;
} */ */

.buttonsub{
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
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


</style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <a href="/product/create" class="button"><span>Add Product <i
                                    class="fas fa-plus-circle"></i></span></a>
                    </div>

                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Product_ID</th>
                                    <th>SKU</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Selling_Price</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->id }}
                                        </td>
                                        <td>
                                            {{ $product->sku }}
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            {{ $product->discount }}
                                        </td>
                                        <td>
                                            {{ $product->sp }}
                                        </td>
                                        <td>
                                            {!! $product->description !!}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>

                                        <td>
                                            <img src="{{ asset($product->picture) }}" width="50" alt="">

                                        </td>
                                        <td>
                                            <a href="/product/{{ $product->id }}/edit" class="btn bagde bg-primary">Edit
                                                <i class="far fa-edit"></i></a>
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

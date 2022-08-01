@extends('backend.app')
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
                        <a href="/about" class="button"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/about/{{ $about->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="description">Description of About US</label>
                                <textarea name="description" id="description" type="text" class="form-control" rows="3" >{{ $about->description }}</textarea>
                            </div>
                            
                            <div>
                            <button type="submit" class="button"><span>Update <i class="far fa-save"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection